<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */
use yii\helpers\Html;

?>
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?=Yii::$app->homeUrl?>">
                    <?= Html::img('@web/static/images/logo.png') ?>
                </a>
            </div>
            <div class="col-xs-8">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=5" width="100%" height="70"
                        frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            </div>
            <div class="col-xs-2">
                热点
            </div>
        </div>

    </div>
</div>
