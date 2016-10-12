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
                <a href="<?= Yii::$app->homeUrl ?>">
                    <?= Html::img('@web/static/images/logo.png') ?>
                </a>
            </div>
            <div class="col-xs-8">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=5" width="100%"
                        height="70"
                        frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            </div>
            <div class="col-xs-2">
                <a href="http://s.click.taobao.com/t?e=m%3D2%26s%3DJapxC457pAocQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAjpsl2D9rIY37li5%2BwaNkROCWq18cqI6t7QEpzPETciCXivlwmqvi0q2xFkaU%2F3QbTDVuRn8ddiDsEVVC24eqozO54LQ%2FVw1L9X5LHh3Z8M%2BWS6ALZVeqlk9XUfbPSJC%2F06deTzTIbffYpyF7ku%2BxKhYihHsKWm3yX8P%2FHYXvjWwxg5p7bh%2BFbQ%3D"
                   target="_blank">
                    <?= Html::img('http://ww3.sinaimg.cn/large/6a5cfb7bgw1f8phsx8f9zj206e046t8x.jpg',['style'=>'height: 80px']) ?>
                </a>
            </div>
        </div>

    </div>
</div>
