<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\behaviors;

use yii\base\Behavior;
use yii\base\ErrorException;

class SoftDeleteBehavior extends Behavior
{
    const EVENT_AFTER_SOFT_DELETE = 'afterSoftDelete';

    const EVENT_AFTER_SOFT_RESTORE = 'afterSoftRestore';

    /**
     * @var string 软删除字段
     */
    public $softDeletedAttribute = 'deleted';

    /**
     * @var string 标记为软删除的值
     */
    public $softDeletedValue = 'Y';

    /**
     * @var string 标记为未软删除的值
     */
    public $unSoftDeletedValue = 'N';

    /**
     * 软删除
     *
     * @return bool 是否软删除成功
     */
    public function softDelete()
    {
        $tr = \Yii::$app->db->beginTransaction();

        try {
            $owner = $this->owner;
            $owner->{$this->softDeletedAttribute} = $this->softDeletedValue;
            if (!$owner->owner->save(true, [$this->softDeletedAttribute])) {
                throw new ErrorException('保存到数据库错误');
            }

            $this->afterSoftDelete();

            $tr->commit();
            return false;
        } catch (\Exception $e) {
            $tr->rollBack();
            return false;
        }
    }

    public function afterSoftDelete()
    {
        $this->owner->trigger(self::EVENT_AFTER_SOFT_DELETE);
    }

    /**
     * 软删除
     *
     * @return bool 是否软删除成功
     */
    public function softRestore()
    {
        $tr = \Yii::$app->db->beginTransaction();

        try {
            $owner = $this->owner;
            $owner->{$this->softDeletedAttribute} = $this->unSoftDeletedValue;
            if (!$owner->owner->save(true, [$this->softDeletedAttribute])) {
                throw new ErrorException('保存到数据库错误');
            }

            $this->afterSoftRestore();

            $tr->commit();
            return false;
        } catch (\Exception $e) {
            $tr->rollBack();
            return false;
        }
    }

    public function afterSoftRestore()
    {
        $this->owner->trigger(self::EVENT_AFTER_SOFT_RESTORE);
    }

    /**
     * @return bool 是否已经被软删除
     */
    public function getIsSoftDeleted()
    {
        return $this->owner->{$this->softDeletedAttribute} == $this->softDeletedValue;
    }
}