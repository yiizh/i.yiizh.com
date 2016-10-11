<?php

namespace common\models;

use common\behaviors\SoftDeleteBehavior;
use common\models\base\BaseCatalog;
use yii\helpers\ArrayHelper;

/**
 * @method bool softDelete() 软删除 see [[SoftDeleteBehavior::softDelete()]] for more
 * @method bool softRestore() 软删除恢复 see [[SoftDeleteBehavior::softRestore()]] for more
 * @method bool getIsSoftDeleted() 是否已被软删除 see [[SoftDeleteBehavior::getIsSoftDeleted()]] for more
 */
class Catalog extends BaseCatalog
{
    /**
     * @inheritdoc
     * @return \common\models\query\CatalogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CatalogQuery(get_called_class());
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
     * @return array
     */
    public static function getItems()
    {
        $items = [
            0 => '顶级分类',
        ];

        $models = static::find()->active()->all();
        return ArrayHelper::merge($items, ArrayHelper::map($models, 'id', 'name'));
    }

    /**
     * @param int $linkId
     * @return bool
     */
    public function hasLink($linkId)
    {
        return CatalogLink::find()
            ->andWhere([
                'catalogId' => $this->id,
                'linkId' => $linkId
            ])
            ->exists();
    }
}
