<?php

use console\components\Migration;

class m161010_065401_create_table_link extends Migration
{
    public $tableName = '{{%link}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->bigPrimaryKey()->comment('主键'),
            'title' => $this->string(200)->notNull()->comment('标题'),
            'titleColor' => $this->string(32)->comment('标题颜色'),
            'linkUrl' => $this->text()->notNull()->comment('链接地址'),
            'imageUrl' => $this->text()->comment('图片地址'),
            'deleted' => 'enum("Y","N") not null default "N" comment "是否删除"',
            'expireDate' => $this->date()->comment('过期时间'),
            'createdAt' => $this->integer()->comment('创建时间'),
            'updatedAt' => $this->integer()->comment('更新时间'),
        ], $this->tableOptions . ' comment "链接表"');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
