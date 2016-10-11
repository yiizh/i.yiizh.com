<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/**
 * @var $this View
 * @var $content string
 */

$this->beginContent('@frontend/views/layouts/blank.php');
?>
    <div id="page-top">
        <div class="container">
            <?= Nav::widget([
                'options' => [
                    'class' => 'nav nav-pills'
                ],
                'items' => [
                    ['label' => '设为首页', 'url' => 'javascript: void(0);', 'linkOptions' => ['onclick' => 'setHome(this, "' . Url::to('/', true) . '")']],
                ]
            ]) ?>
        </div>
    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= $this->render('header') ?>
        <?= $content ?>
    </div>
<?php $this->endContent(); ?>