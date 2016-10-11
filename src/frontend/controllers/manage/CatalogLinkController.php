<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace frontend\controllers\manage;


use common\models\Catalog;
use common\models\CatalogLink;
use frontend\components\BaseManageController;
use frontend\models\search\LinkSearch;
use Yii;
use yii\web\NotFoundHttpException;

class CatalogLinkController extends BaseManageController
{
    public function accessRules()
    {
        $rules = parent::accessRules();

        $rules[] = [
            'allow' => true,
            'roles' => ['manageCatalog']
        ];

        return $rules;
    }

    public function verbs()
    {
        return [
            'add' => ['post'],
            'remove' => ['post']
        ];
    }

    public function actionCreate($catalogId)
    {
        $catalog = $this->findCatalog($catalogId);

        $searchModel = new LinkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('create', [
            'catalog' => $catalog,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * @param $catalogId
     * @param $linkId
     * @return \yii\web\Response
     */
    public function actionAdd($catalogId, $linkId)
    {
        $model = new CatalogLink();
        $model->catalogId = $catalogId;
        $model->linkId = $linkId;
        if ($model->save()) {
            return $this->redirect($this->getReturnUrl(['create', 'catalogId' => $catalogId]));
        }

    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionRemove($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect($this->getReturnUrl(['/manage/catalog/view', 'id' => $model->catalogId]));
    }

    /**
     * @return \yii\web\Response
     */
    public function actionSaveSort()
    {
        $sorts = Yii::$app->request->post('Sort', []);
        foreach ($sorts as $sortOrder => $id) {
            CatalogLink::updateAll(['sortOrder' => $sortOrder], ['id' => $id]);
        }

        return $this->redirect($this->getReturnUrl());
    }

    /**
     * @param $id
     * @return Catalog
     * @throws NotFoundHttpException
     */
    protected function findCatalog($id)
    {
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $id
     * @return CatalogLink
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = CatalogLink::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}