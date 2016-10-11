<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\components;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Class BaseWebController
 * @package common\components
 *
 * @method View getView()
 */
class BaseWebController extends Controller
{
    /**
     * @return array
     */
    public function verbs()
    {
        return [];
    }

    /**
     * @return array
     */
    public function trustActions()
    {
        return [];
    }

    /**
     * @return array
     */
    public function publicActions()
    {
        return [];
    }

    public function accessRules()
    {
        $accessRules = [];
        $publicActions = $this->publicActions();
        if (count($publicActions) > 0) {
            $accessRules[] = [
                'allow' => true,
                'actions' => in_array('*', $publicActions) ? [] : $publicActions,
            ];
        }
        return $accessRules;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => $this->accessRules(),
        ];
        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => $this->verbs()
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (in_array($action->id, $this->trustActions())) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * @param null $defaultValue
     * @return string
     */
    public function getReturnUrl($defaultValue = null)
    {
        $request = \Yii::$app->request;
        $returnUrl = $request->get('returnUrl');
        if ($returnUrl != null) {
            return Url::to($returnUrl);
        }

        $returnUrl = $request->post('returnUrl');
        if ($returnUrl != null) {
            return Url::to($returnUrl);
        }

        return Url::to($defaultValue);
    }
}