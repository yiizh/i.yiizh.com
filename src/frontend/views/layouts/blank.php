<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

use common\widgets\JsBlock;
use frontend\assets\AppAsset;
use yii\helpers\Html;

/**
 * @var $content string
 */

AppAsset::register($this);
?>
<?php JsBlock::begin() ?>
    <script>
        (function (win, doc) {
            var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0];
            if (!win.alimamatk_show) {
                s.charset = "gbk";
                s.async = true;
                s.src = "http://a.alimama.cn/tkapi.js";
                h.insertBefore(s, h.firstChild);
            }
            ;
            var o = {
                pid: "mm_12693563_14176917_63088625", /*推广单元ID，用于区分不同的推广渠道*/
                appkey: "", /*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
                unid: "", /*自定义统计字段*/
                type: "click" /* click 组件的入口标志 （使用click组件必设）*/
            };
            win.alimamatk_onload = win.alimamatk_onload || [];
            win.alimamatk_onload.push(o);
        })(window, document);
    </script>
<?php JsBlock::end() ?>
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
            <p class="pull-left">
                &copy; yiizh.com <?= date('Y') ?>
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260669478'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1260669478' type='text/javascript'%3E%3C/script%3E"));</script>
            </p>

            <p class="pull-right">
                <span><?= Html::a('阿里云', 'http://s.click.taobao.com/t?e=m%3D2%26s%3DWKB%2BwlQvqPEcQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAuvsX0qrShkuTe1Hf62mOe6CWq18cqI6t7QEpzPETciCXivlwmqvi0q2xFkaU%2F3QbTDVuRn8ddiDsEVVC24eqozO54LQ%2FVw1L9X5LHh3Z8M%2BWS6ALZVeqlk9XUfbPSJC%2F06deTzTIbffYpyF7ku%2BxKguktBpDNMjUkKEtlQK%2BrdARZujRnIpwuLGJe8N%2FwNpGw%3D%3D') ?>
                    服务器</span>
                &#124;
                <span><?= Yii::powered() ?></span>
            </p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>