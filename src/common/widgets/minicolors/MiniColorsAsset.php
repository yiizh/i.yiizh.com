<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\widgets\minicolors;


use yii\web\AssetBundle;

class MiniColorsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/abeautifulsite/jquery-minicolors';

    public $css = [
        'jquery.minicolors.css'
    ];
    public $js = [
        'jquery.minicolors.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}