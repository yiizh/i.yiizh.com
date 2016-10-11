<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var $this yii\web\View
 * @var $model common\models\Link
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '链接', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
        'attributes' => [
            'id',
            'title',
            [
                'format' => 'html',
                'attribute' => 'titleColor',
                'value' => Html::tag('span', $model->titleColor, ['style' => "color: {$model->titleColor}"])
            ],
            'linkUrl:ntext',
            'imageUrl:ntext',
            'deleted',
            'expireDate',
            'createdAt:datetime',
            'updatedAt:datetime',
        ],
    ]) ?>

</div>
