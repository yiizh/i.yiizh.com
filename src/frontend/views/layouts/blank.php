<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use frontend\assets\AppAsset;
use yii\helpers\Html;

/**
 * @var $content string
 */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?= $content ?>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; yiizh.com <?= date('Y') ?></p>

            <p class="pull-right">
                <span><?=Html::a('阿里云','http://s.click.taobao.com/t?e=m%3D2%26s%3DWKB%2BwlQvqPEcQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAuvsX0qrShkuTe1Hf62mOe6CWq18cqI6t7QEpzPETciCXivlwmqvi0q2xFkaU%2F3QbTDVuRn8ddiDsEVVC24eqozO54LQ%2FVw1L9X5LHh3Z8M%2BWS6ALZVeqlk9XUfbPSJC%2F06deTzTIbffYpyF7ku%2BxKguktBpDNMjUkKEtlQK%2BrdARZujRnIpwuLGJe8N%2FwNpGw%3D%3D')?>服务器</span>
                &#124;
                <span><?= Yii::powered() ?></span>
            </p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>