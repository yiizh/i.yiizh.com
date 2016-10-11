<?php

namespace common\models\query;
use common\behaviors\SoftDeleteQueryBehavior;

/**
 * This is the ActiveQuery class for [[\common\models\Catalog]].
 *
 * @see \common\models\Catalog
 * @method CatalogQuery active() 未删除 see [[SoftDeleteQueryBehavior::active()]] for more
 * @method CatalogQuery deleted() 已删除 see [[SoftDeleteQueryBehavior::deleted()]] for more
 */
class CatalogQuery extends \yii\db\ActiveQuery
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors[] = [
            'class' => SoftDeleteQueryBehavior::className()
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     * @return \common\models\Catalog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Catalog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
