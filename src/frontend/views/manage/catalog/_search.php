<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this View
 * @var $model frontend\models\search\CatalogSearch
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="catalog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parentId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'linkCount') ?>

    <?php // echo $form->field($model, 'seoTitle') ?>

    <?php // echo $form->field($model, 'seoKeywords') ?>

    <?php // echo $form->field($model, 'seoDescription') ?>

    <?php // echo $form->field($model, 'imageUrl') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
