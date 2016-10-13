<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */
use common\components\View;
use common\helpers\LinkHelper;
use common\models\Link;
use yii\helpers\Html;

/**
 * @var $this View
 * @var $news array
 * @var $catalogs array
 * @var $link Link
 */

$this->title = '网址导航[i.yiizh.com]_实用的上网导航';
?>
<div class="box box-links">
    <div class="box-body">
        <form onsubmit="return gowhere1(this)" target="_blank" name="search_form1" method="get"
              action="http://www.baidu.com/baidu">
            <table width="100%" height="80" cellspacing="0" cellpadding="0" border="0" style="font-family:宋体">
                <tbody>
                <tr>
                    <td>
                        <table width="60%" height="80" cellspacing="0" cellpadding="0" border="0"
                               style="margin: 0 auto;">
                            <input type="hidden" value="0" name="myselectvalue">
                            <input type="hidden" value="utf-8" name="ie">
                            <input type="hidden" name="tn" value="SE_zzsearchcode_shhzc78w">
                            <input type="hidden" name="ct">
                            <input type="hidden" name="lm">
                            <input type="hidden" name="cl">
                            <input type="hidden" name="rn">
                            <tbody>
                            <tr>
                                <td width="25%" valign="bottom">
                                    <div align="center">
                                        <a href="https://www.baidu.com/" target="_blank">
                                            <img border="0" align="bottom" alt="Baidu"
                                                 src="https://www.baidu.com/img/baidu_jgylogo3.gif">
                                        </a>
                                    </div>
                                </td>
                                <td width="75%" valign="bottom">

                                    <input type="radio" value="0" onclick="javascript:this.form.myselectvalue.value=4;"
                                           name="myselect">
                                    <font color="#0000cc">新闻</font>

                                    <input type="radio" value="0" onclick="javascript:this.form.myselectvalue.value=0;"
                                           name="myselect" checked="">
                                    <span class="f12"><font color="#0000cc">网页</font></span>

                                    <input type="radio" value="1" onclick="javascript:this.form.myselectvalue.value=1;"
                                           name="myselect">
                                    <span class="f12"><font color="#0000cc">音乐</font></span>

                                    <input type="radio" value="0" onclick="javascript:this.form.myselectvalue.value=6;"
                                           name="myselect">
                                    <font color="#0000cc">贴吧</font>

                                    <input type="radio" value="0" onclick="javascript:this.form.myselectvalue.value=5;"
                                           name="myselect">
                                    <font color="#0000cc">图片</font>

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="right">
                                        <tbody>
                                        <tr>
                                            <td style="padding-top:10px;">
                                                <font>
                                                    <input id="word" type="text" name="word" size="40"
                                                           onfocus="checkHttps">
                                                </font>
                                                <input type="submit" value="百度一下">
                                            </td>
                                            <td><br></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="8%"></td>
                                <td width="92%"></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <script src="http://s1.bdstatic.com/r/www/cache/global/js/BaiduHttps_20150714_zhanzhang.js"></script>
        <script>
            function checkHttps() {
                BaiduHttps.useHttps();
            }
            ;
            function gowhere1(formname) {
                var data = BaiduHttps.useHttps();
                var url;
                if (formname.myselectvalue.value == "0") {
                    url = data.s == 0 ? "http://www.baidu.com/baidu" : 'https://www.baidu.com/baidu' + '?ssl_s=1&ssl_c' + data.ssl_code;
                    document.search_form1.tn.value = "SE_zzsearchcode_shhzc78w";
                    formname.method = "get";
                }
                if (formname.myselectvalue.value == "1") {
                    document.search_form1.tn.value = "SE_zzsearchcode_shhzc78w";
                    document.search_form1.ct.value = "134217728";
                    document.search_form1.lm.value = "-1";
                    url = "http://mp3.baidu.com/m";
                }
                if (formname.myselectvalue.value == "4") {
                    document.search_form1.tn.value = "SE_zzsearchcode_shhzc78w";
                    document.search_form1.cl.value = "2";
                    document.search_form1.rn.value = "20";
                    url = "http://news.baidu.com/ns";
                }
                if (formname.myselectvalue.value == "5") {
                    document.search_form1.tn.value = "SE_zzsearchcode_shhzc78w";
                    document.search_form1.ct.value = "201326592";
                    document.search_form1.cl.value = "2";
                    document.search_form1.lm.value = "-1";
                    url = "http://image.baidu.com/i";
                }
                if (formname.myselectvalue.value == "6") {
                    document.search_form1.tn.value = "SE_zzsearchcode_shhzc78w";
                    document.search_form1.ct.value = "352321536";
                    document.search_form1.rn.value = "10";
                    document.search_form1.lm.value = "65536";
                    url = "http://tieba.baidu.com";
                }
                formname.action = url;
                return true;
            }
        </script>
    </div>
</div>
<div class="row">
    <div class="col-xs-3">
        <div class="box box-links">
            <div class="box-body">
                <?php foreach (LinkHelper::getLinksByCatalog(5) as $index => $link): ?>
                    <?= $link->getImageLink() ?>
                <?php endforeach; ?>

                <ul class="list-unstyled">
                    <?php
                    for ($i = 0; $i < (count($news) > 5 ? 5 : count($news)); $i++):
                        $v = $news[$i];
                        ?>
                        <li><?= Html::a($v['title'], $v['url'], ['target' => '_blank']) ?></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <a data-type="3" data-tmpl="220x290" data-tmplid="29" data-rd="2" data-style="2" data-border="1"
                   href="#"></a>
            </div>
        </div>
    </div>
    <div class="col-xs-9">
        <div class="box box-links">
            <div class="box-body">
                <div class="row">
                    <?php foreach (LinkHelper::getLinksByCatalog(4) as $index => $link): ?>
                        <div class="col-xs-2">
                            <?= $link->getLink() ?>
                        </div>
                        <?php if (floor($index / 6) == 1 && $index % 6 == 5): ?>
                            <hr class="divider-dash"/>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <a data-type="3" data-tmpl="800x90" data-tmplid="195" data-rd="2" data-style="2" data-border="1" href="#"></a>
        <div class="box box-dl">
            <div class="box-header">
                <h4 class="box-title">分类导航</h4>
            </div>
            <div class="box-body no-padding">
                <ul class="link-list">
                    <?php foreach ($catalogs as $catalog): ?>
                        <li class="hover">
                            <a class="more" href="javascript: void(0)">更多</a>
                            <dl>
                                <dt>
                                    <a href="javascript: void(0)" class="text-blue"><?= $catalog['name'] ?></a>
                                </dt>
                                <?php foreach ($catalog['links'] as $link): ?>
                                    <dd>
                                        <?= $link->getLink() ?>
                                    </dd>
                                <?php endforeach; ?>
                            </dl>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
