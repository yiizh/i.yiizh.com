<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use frontend\forms\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var LoginForm $model
 */
$this->title = '登录';
?>
<div class="site-login">
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 col-md-offset-4">
                    <div class="page-header">
                        <h1><?= $this->title ?></h1>
                    </div>

                    <p class="text-muted">填写以下信息登录</p>

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['placeholder' => '邮箱']) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码']) ?>

                    <p class="hint-block">
                        忘记密码？
                    </p>

                    <div class="form-group">
                        <?= Html::submitButton('登录', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>