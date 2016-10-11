<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\behaviors;

use yii\base\Behavior;
use yii\db\ActiveQuery;

class SoftDeleteQueryBehavior extends Behavior
{
    /**
     * @return ActiveQuery
     */
    public function active()
    {
        return $this->owner->andWhere('[[deleted]]="N"');
    }

    /**
     * @return ActiveQuery
     */
    public function deleted()
    {
        return $this->owner->andWhere('[[deleted]]="Y"');
    }
}