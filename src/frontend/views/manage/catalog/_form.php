<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use common\models\Catalog;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this View
 * @var $model common\models\Catalog
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parentId')->dropDownList(Catalog::getItems()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'linkCount')->textInput() ?>

    <?= $form->field($model, 'seoTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seoKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seoDescription')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
