<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\components\View;
use yii\helpers\Html;


/**
 * @var $this View
 * @var $model common\models\Catalog
 */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => '分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
