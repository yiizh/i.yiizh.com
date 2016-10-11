<?php

use console\components\Migration;

class m161011_060217_create_table_catalog_link extends Migration
{
    public $tableName = '{{%catalog_link}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->bigPrimaryKey()->comment('主键'),
            'catalogId' => $this->bigInteger()->notNull()->comment('分类 ID'),
            'linkId' => $this->bigInteger()->notNull()->comment('链接 ID'),
            'sortOrder' => $this->integer()->unsigned()->defaultValue(999999)->comment('排序'),
            'createdAt' => $this->integer()->comment('创建时间'),
        ], $this->tableOptions . ' comment "分类链接表"');

        $this->addForeignKey('fk-catalog_link_catalogId-catalog-id', $this->tableName, 'catalogId', '{{%catalog}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-catalog_link_linkId-link-id', $this->tableName, 'linkId', '{{%link}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
