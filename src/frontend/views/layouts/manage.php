<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\User;
use yii\widgets\Breadcrumbs;

/**
 * @var $this View
 * @var $content string
 * @var $webUser User
 * @var $user \common\models\User
 */

$webUser = Yii::$app->user;
$user = $webUser->getIdentity();
$this->beginContent('@frontend/views/layouts/blank.php');
?>
<?php
NavBar::begin([
    'brandLabel' => '管理平台',
    'brandUrl' => ['/manage/default/index'],
    'options' => [
        'class' => 'navbar-inverse navbar-static-top',
        'id' => 'manage-navbar'
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $this->getMenu('top'),
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => $user->name, 'url' => 'javascript: void(0);'],
        ['label' => '退出登录', 'url' => ['/manage/default/logout'], 'linkOptions' => ['data' => ['method' => 'post']]],

    ],
]);
NavBar::end();
?>

    <div class="container" style="padding-top: 0;">
        <div class="box">
            <div class="box-body">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink' => ['label' => '管理首页', 'url' => ['/manage/default/index']]
                ]) ?>
                <?= $content ?>
            </div>
        </div>

    </div>
<?php $this->endContent(); ?>