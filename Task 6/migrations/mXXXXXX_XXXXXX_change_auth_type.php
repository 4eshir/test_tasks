<?php

use yii\db\Migration;

class mXXXXXX_XXXXXX_change_auth_type extends Migration
{
    public function init()
    {
        $this->db = Yii::$app->db_config;
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'group_type', $this->boolean());

        $this->createTable('auth_tokens', [
            'id' => Schema::TYPE_PK,
            'users_id' => $this->integer()->nullable(false),
            'auth_key' => $this->string(32)->nullable(false),
        ]);

        $this->addForeignKey('key1_ayth_tokens',
            'auth_tokens', 'users_id',
            'users', 'id',
            'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'group_type');

        $this->dropForeignKey('key1_ayth_tokens', 'auth_tokens');

        $this->dropTable('auth_tokens');

        return true;
    }
}
