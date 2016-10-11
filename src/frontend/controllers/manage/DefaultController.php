<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace frontend\controllers\manage;

use frontend\components\BaseManageController;
use frontend\forms\LoginForm;
use Yii;

class DefaultController extends BaseManageController
{
    public function publicActions()
    {
        return [
            'login'
        ];
    }

    public function accessRules()
    {
        $rules = parent::accessRules();

        $rules[] = [
            'allow' => true,
            'roles' => ['@']
        ];

        return $rules;
    }

    public function verbs()
    {
        return [
            'logout' => ['post']
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 登录
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 退出登录
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}