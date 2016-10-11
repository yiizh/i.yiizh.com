<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use common\models\Catalog;
use common\models\Link;
use frontend\models\search\LinkSearch;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this View
 * @var $catalog Catalog
 * @var $dataProvider ActiveDataProvider
 * @var $searchModel LinkSearch
 */

$this->title = '添加链接_' . $catalog->name;
$this->params['breadcrumbs'][] = ['label' => '分类', 'url' => ['/manage/catalog/index']];
$this->params['breadcrumbs'][] = ['label' => $catalog->name, 'url' => ['/manage/catalog/view', 'id' => $catalog->id]];
$this->params['breadcrumbs'][] = '添加链接';

?>
<div class="catalog-link-create">
    <header class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </header>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'format' => 'raw',
                'attribute' => 'title',
                'value' => function (Link $model, $key, $index, $column) {
                    return Html::a($model->title, $model->linkUrl, ['style' => "color: {$model->titleColor}", 'target' => '_blank']);
                }
            ],
            'imageUrl:ntext',
            'expireDate',

            [
                'class' => ActionColumn::className(),
                'template' => '{add} {remove}',
                'buttons' => [
                    'add' => function ($url, Link $model, $key) use ($catalog) {
                        if (!$catalog->hasLink($model->id)) {
                            return Html::a('添加', ['add', 'catalogId' => $catalog->id, 'linkId' => $model->id, 'returnUrl' => Yii::$app->request->url], [
                                'class' => 'btn btn-sm btn-primary',
                                'data' => [
                                    'method' => 'post'
                                ]
                            ]);
                        }
                    },
                    'remove' => function ($url, Link $model, $key) use ($catalog) {
                        if ($catalog->hasLink($model->id)) {
                            return Html::tag('span', '已添加', ['class' => 'label label-success']);
                        }
                    }
                ]
            ],
        ],
    ]); ?>
</div>
