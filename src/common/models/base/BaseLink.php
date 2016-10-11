<?php

namespace common\models\base;

/**
 * This is the model class for table "{{%link}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $titleColor
 * @property string $linkUrl
 * @property string $imageUrl
 * @property string $deleted
 * @property string $expireDate
 * @property integer $createdAt
 * @property integer $updatedAt
 */
class BaseLink extends \common\models\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'linkUrl'], 'required'],
            [['linkUrl', 'imageUrl', 'deleted'], 'string'],
            [['expireDate'], 'safe'],
            [['createdAt', 'updatedAt'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['titleColor'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'title' => '标题',
            'titleColor' => '标题颜色',
            'linkUrl' => '链接地址',
            'imageUrl' => '图片地址',
            'deleted' => '是否删除',
            'expireDate' => '过期时间',
            'createdAt' => '创建时间',
            'updatedAt' => '更新时间',
        ];
    }
}
