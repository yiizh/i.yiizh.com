<?php

namespace frontend\controllers\manage;

use common\models\Catalog;
use common\models\CatalogLink;
use frontend\components\BaseManageController;
use frontend\models\search\CatalogSearch;
use frontend\models\search\CatalogTrashSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * CatalogController implements the CRUD actions for Catalog model.
 */
class CatalogController extends BaseManageController
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

    /**
     * @inheritdoc
     */
    public function verbs()
    {
        return [
            'delete' => ['post'],
            'restore' => ['post']
        ];
    }

    /**
     * Lists all Catalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTrash()
    {
        $searchModel = new CatalogTrashSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('trash', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Catalog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $query = CatalogLink::find()
            ->andWhere(['catalogId' => $model->id])
            ->orderBy(['sortOrder' => SORT_ASC]);

        $linkProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        return $this->render('view', [
            'model' => $model,
            'linkProvider' => $linkProvider
        ]);
    }

    /**
     * Creates a new Catalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Catalog();
        $model->linkCount = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Catalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Catalog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->softDelete();

        return $this->redirect($this->getReturnUrl(['index']));
    }

    /**
     * 恢复删除的分类
     *
     * @param integer $id
     * @return mixed
     */
    public function actionRestore($id)
    {
        $this->findModel($id)->softRestore();

        return $this->redirect($this->getReturnUrl(['index']));
    }

    /**
     * Finds the Catalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
