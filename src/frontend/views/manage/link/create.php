<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use yii\helpers\Html;


/**
 * @var $this yii\web\View
 * @var $model common\models\Link
 */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => '链接', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
