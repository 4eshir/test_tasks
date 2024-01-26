<?php

use yii\db\Migration;

class mXXXXXX_XXXXXX_create_user_client_link extends Migration
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
        $this->createTable('users_clients', [
            'id' => Schema::TYPE_PK,
            'users_id' => $this->integer()->nullable(false),
            'clients_id' => $this->integer()->nullable(false),
        ]);

        $this->addForeignKey('key1_users_client',
            'users_clients', 'users_id',
            'users', 'id',
            'RESTRICT', 'RESTRICT');

        $this->addForeignKey('key2_users_client',
            'users_clients', 'clients_id',
            'clients', 'id',
            'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('key1_users_client', 'users_clients');
        $this->dropForeignKey('key2_users_client', 'users_clients');

        $this->dropTable('users_clients');

        return true;
    }
}
