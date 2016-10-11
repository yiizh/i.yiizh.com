<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\models\Link;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $searchModel frontend\models\search\LinkSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = '链接';
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
            [
                'format' => 'raw',
                'attribute' => 'title',
                'value' => function (Link $model, $key, $index, $column) {
                    return Html::a($model->title, $model->linkUrl, ['style' => "color: {$model->titleColor}", 'target' => '_blank']);
                }
            ],
            'imageUrl:ntext',
            'expireDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
