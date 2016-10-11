<?php

use console\components\Migration;

class m161010_021412_create_table_user extends Migration
{
    public $tableName = '{{%user}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->comment('主键'),
            'email' => $this->string(200)->notNull()->comment('邮箱'),
            'name' => $this->string(50)->notNull()->comment('昵称'),
            'authKey' => $this->string(32)->notNull()->comment('授权秘钥'),
            'passwordHash' => $this->string(100)->comment('加密密钥'),
            'passwordResetToken' => $this->string(100)->comment('重置密码令牌'),
            'status' => $this->smallInteger()->notNull()->defaultValue('100')->comment('状态'),
            'createdAt' => $this->integer()->comment('创建时间'),
            'updatedAt' => $this->integer()->comment('更新时间'),
        ], $this->tableOptions . ' comment "用户表"');
        $this->createIndex('unq-email', $this->tableName, 'email', true);
        $this->createIndex('idx-status', $this->tableName, 'status');

        $this->insert($this->tableName, [
            'id' => 1,
            'email' => 'admin@example.com',
            'name' => '管理员',
            'authKey' => Yii::$app->security->generateRandomString(),
            'passwordHash' => Yii::$app->security->generatePasswordHash('123456'),
            'status' => 100,
            'createdAt' => time(),
            'updatedAt' => time()
        ]);
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
