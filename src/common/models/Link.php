<?php

namespace common\models;

use common\behaviors\SoftDeleteBehavior;
use common\models\base\BaseLink;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/**
 * @method bool softDelete() 软删除 see [[SoftDeleteBehavior::softDelete()]] for more
 * @method bool softRestore() 软删除恢复 see [[SoftDeleteBehavior::softRestore()]] for more
 * @method bool getIsSoftDeleted() 是否已被软删除 see [[SoftDeleteBehavior::getIsSoftDeleted()]] for more
 */
class Link extends BaseLink
{
    /**
     * @inheritdoc
     * @return \common\models\query\LinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LinkQuery(get_called_class());
    }

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [
            'linkUrl', 'url'
        ];
        $rules[] = [
            'expireDate', 'date', 'format' => 'php:Y-m-d'
        ];
        return $rules;
    }

    public function attributeHints()
    {
        return [
            'expireDate' => '不填默认为永不过期'
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors[] =
            [
                'class' => SoftDeleteBehavior::className(),
            ];
        return $behaviors;
    }

    /**
     * @param array $options
     * @return string
     */
    public function getLink($options = [])
    {
        if ($this->titleColor) {
            $options['style'] = "color:$this->titleColor";
        }
        $options['target'] = '_blank';
        return Html::a($this->title, $this->linkUrl, $options);
    }

    /**
     * @param array $options
     * @return string
     */
    public function getImageLink($options = [])
    {
        $linkOptions = ArrayHelper::getValue($options, 'linkOptions', []);
        $imageOptions = ArrayHelper::getValue($options, 'imageOptions', []);
        if ($this->imageUrl == null) {
            return $this->getLink($linkOptions);
        }
        $linkOptions['target'] = '_blank';
        return Html::a(Html::img($this->imageUrl, $imageOptions), $this->linkUrl, $linkOptions);
    }
}
