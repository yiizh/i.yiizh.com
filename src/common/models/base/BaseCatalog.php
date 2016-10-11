<?php

namespace common\models\base;

/**
 * This is the model class for table "{{%catalog}}".
 *
 * @property integer $id
 * @property integer $parentId
 * @property string $name
 * @property string $content
 * @property integer $linkCount
 * @property string $seoTitle
 * @property string $seoKeywords
 * @property string $seoDescription
 * @property string $imageUrl
 * @property string $deleted
 * @property integer $createdAt
 * @property integer $updatedAt
 */
class BaseCatalog extends \common\models\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentId', 'linkCount', 'createdAt', 'updatedAt'], 'integer'],
            [['name'], 'required'],
            [['content', 'deleted'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['seoTitle', 'seoKeywords', 'seoDescription', 'imageUrl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'parentId' => '上级分类',
            'name' => '名称',
            'content' => '详细介绍',
            'linkCount' => '显示的最大链接数量',
            'seoTitle' => 'Seo Title',
            'seoKeywords' => 'Seo Keywords',
            'seoDescription' => 'Seo Description',
            'imageUrl' => '图片地址',
            'deleted' => '是否删除',
            'createdAt' => '创建时间',
            'updatedAt' => '更新时间',
        ];
    }
}
