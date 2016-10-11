<?php

use console\components\Migration;

class m161011_050546_create_table_catalog extends Migration
{
    public $tableName = '{{%catalog}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->bigPrimaryKey()->comment('主键'),
            'parentId' => $this->bigInteger()->notNull()->defaultValue(0)->comment('上级分类'),
            'name' => $this->string(100)->notNull()->comment('名称'),
            'content' => $this->text()->comment('详细介绍'),
            'linkCount' => $this->integer()->unsigned()->defaultValue(0)->comment('显示的最大链接数量'),
            'seoTitle' => $this->string()->comment(''),
            'seoKeywords' => $this->string()->comment(''),
            'seoDescription' => $this->string()->comment(''),
            'imageUrl' => $this->string()->comment('图片地址'),
            'deleted' => 'enum("Y", "N") default "N" comment "是否删除"',
            'createdAt' => $this->integer()->comment('创建时间'),
            'updatedAt' => $this->integer()->comment('更新时间'),
        ], $this->tableOptions . ' comment "分类表"');

        $this->createIndex('idx-catalog_parentId', $this->tableName, 'parentId');
        $this->createIndex('idx-catalog_deleted', $this->tableName, 'deleted');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
