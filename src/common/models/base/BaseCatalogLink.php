<?php

namespace common\models\base;

use common\models\Catalog;
use common\models\Link;

/**
 * This is the model class for table "{{%catalog_link}}".
 *
 * @property integer $id
 * @property integer $catalogId
 * @property integer $linkId
 * @property integer $sortOrder
 * @property integer $createdAt
 */
class BaseCatalogLink extends \common\models\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalogId', 'linkId'], 'required'],
            [['catalogId', 'linkId', 'sortOrder', 'createdAt'], 'integer'],
            [['linkId'], 'exist', 'skipOnError' => true, 'targetClass' => Link::className(), 'targetAttribute' => ['linkId' => 'id']],
            [['catalogId'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalogId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'catalogId' => '分类 ID',
            'linkId' => '链接 ID',
            'sortOrder' => '排序',
            'createdAt' => '创建时间',
        ];
    }
}
