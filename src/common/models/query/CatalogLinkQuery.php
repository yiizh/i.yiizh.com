<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\CatalogLink]].
 *
 * @see \common\models\CatalogLink
 */
class CatalogLinkQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return \common\models\CatalogLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\CatalogLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
