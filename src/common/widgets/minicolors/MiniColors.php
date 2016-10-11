<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\widgets\minicolors;


use yii\bootstrap\InputWidget;
use yii\helpers\Html;

class MiniColors extends InputWidget
{
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'form-control');
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
    }

    public function registerClientScript()
    {
        $view = $this->getView();
        MiniColorsAsset::register($view);
        $view->registerJs(<<<JS
$("#{$this->options['id']}").minicolors({
    theme: 'bootstrap'
});
JS
        );
    }
}