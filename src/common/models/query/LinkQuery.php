<?php

namespace common\models\query;

use common\behaviors\SoftDeleteQueryBehavior;

/**
 * This is the ActiveQuery class for [[\common\models\Link]].
 *
 * @see \common\models\Link
 * @method LinkQuery active() 未删除 see [[SoftDeleteQueryBehavior::active()]] for more
 * @method LinkQuery deleted() 已删除 see [[SoftDeleteQueryBehavior::deleted()]] for more
 */
class LinkQuery extends \yii\db\ActiveQuery
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
     * @return \common\models\Link[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Link|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
