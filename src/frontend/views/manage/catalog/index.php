<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this View
 * @var $searchModel frontend\models\search\CatalogSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = '分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
