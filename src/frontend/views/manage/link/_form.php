<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use common\widgets\minicolors\MiniColors;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this View
 * @var $model common\models\Link
 * @var $form yii\widgets\ActiveForm
 */


?>

<div class="link-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titleColor')->widget(MiniColors::className()) ?>

    <?= $form->field($model, 'linkUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expireDate')->widget(DatePicker::className(),[
        'language'=>Yii::$app->language,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->hint($model->getAttributeHint('expireDate')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
