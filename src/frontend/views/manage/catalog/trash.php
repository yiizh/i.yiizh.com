<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use frontend\models\search\CatalogTrashSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this View
 * @var $searchModel CatalogTrashSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = '回收站';
$this->params['breadcrumbs'][] = ['label' => '分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'parentId',
            'name',
            'linkCount',
            // 'seoTitle',
            // 'seoKeywords',
            // 'seoDescription',
            // 'imageUrl:url',
            // 'deleted',
            'createdAt:datetime',
            'updatedAt:datetime',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {restore}',
                'buttons' => [
                    'restore' => function ($url, $model, $key) {
                        return Html::a('恢复', ['restore', 'id' => $model->id, 'returnUrl' => Yii::$app->request->url], [
                            'class' => '',
                            'data' => [
                                'method' => 'post',
                                'confirm' => '确认恢复？'
                            ]
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
