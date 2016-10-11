<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\helpers;


use common\models\Catalog;
use common\models\CatalogLink;
use common\models\Link;

class LinkHelper
{
    /**
     * @param int $catalogId
     * @param int $limit
     * @return array|\common\models\Link[]
     */
    public static function getLinksByCatalog($catalogId, $limit = 0)
    {
        $catalog = Catalog::findOne($catalogId);
        if ($catalog) {
            $query = Link::find()
                ->active()
                ->from(Link::tableName() . ' as t')
                ->innerJoin(CatalogLink::tableName() . ' as t2', 't2.linkId = t.id')
                ->andWhere(['t2.catalogId' => $catalogId])
                ->orderBy(['t2.sortOrder' => SORT_ASC]);
            if ($catalog->linkCount != 0 && $catalog->linkCount < $limit) {
                $query->limit($catalog->linkCount);
            } elseif ($limit > 0) {
                $query->limit($limit);
            }
            return $query->all();
        } else {
            return [];
        }
    }
}