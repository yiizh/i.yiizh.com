<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use common\models\CatalogLink;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\jui\Sortable;
use yii\widgets\DetailView;

/**
 * @var $this View
 * @var $model common\models\Catalog
 * @var $linkProvider ActiveDataProvider
 * @var $catalogLink CatalogLink
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$linkItems = [];
foreach ($linkProvider->getModels() as $catalogLink) {
    $link = $catalogLink->link;
    $linkItems[] = [
        'content' => Html::a('移除', ['/manage/catalog-link/remove', 'id' => $link->id, 'returnUrl' => Yii::$app->request->url], [
                'class' => 'btn btn-xs btn-danger pull-right',
                'data' => [
                    'method' => 'post'
                ]
            ])
            . $link->getLink()
            . Html::hiddenInput("Sort[]", $catalogLink->id),
    ];
}
?>
<div class="catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-5">
            <h3>分类信息</h3>

            <p>
                <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php if ($model->getIsSoftDeleted()): ?>
                    <?= Html::a('恢复', ['restore', 'id' => $model->id, 'returnUrl' => Yii::$app->request->url], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'confirm' => '确认恢复?',
                            'method' => 'post',
                        ],
                    ]) ?>
                <?php else: ?>
                    <?= Html::a('删除', ['delete', 'id' => $model->id, 'returnUrl' => Yii::$app->request->url], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => '确认删除?',
                            'method' => 'post',
                        ],
                    ]) ?>
                <?php endif; ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="180">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    'id',
                    'parentId',
                    'name',
                    'content:ntext',
                    'linkCount',
                    'seoTitle',
                    'seoKeywords',
                    'seoDescription',
                    'imageUrl:url',
                    'deleted',
                    'createdAt:datetime',
                    'updatedAt:datetime',
                ],
            ]) ?>
        </div>
        <div class="col-xs-7">
            <h3>链接信息</h3>
            <?= Html::beginForm(['/manage/catalog-link/save-sort', 'returnUrl' => Yii::$app->request->url]) ?>
            <p>
                <?= Html::submitButton('保存排序', ['class' => 'btn btn-primary pull-right']) ?>
                <?= Html::a('添加链接', ['/manage/catalog-link/create', 'catalogId' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>

            <?= Sortable::widget([
                'options' => [
                    'tag' => 'div',
                    'class' => 'list-group'
                ],
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'list-group-item'
                ],
                'clientOptions' => ['cursor' => 'move'],
                'items' => $linkItems,
            ]) ?>

            <?= Html::endForm() ?>
        </div>
    </div>
</div>
