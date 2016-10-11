<?php

namespace common\models;

use common\models\base\BaseCatalogLink;

/**
 *
 * @property Link $link
 * @property Catalog $catalog
 */
class CatalogLink extends BaseCatalogLink
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLink()
    {
        return $this->hasOne(Link::className(), ['id' => 'linkId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalogId']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CatalogLinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CatalogLinkQuery(get_called_class());
    }

}
