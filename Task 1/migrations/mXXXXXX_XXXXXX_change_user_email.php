<?php

use yii\db\Migration;

class mXXXXXX_XXXXXX_change_user_email extends Migration
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
        $this->alterColumn(
            'users',
            'email', 
            $this->string(50)->unique()->nullable(false)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn(
            'users',
            'email', 
            $this->string(50)->defaultValue("default")->nullable(false)
        );

        return true;
    }
}
