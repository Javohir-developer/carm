<?php

use yii\db\Migration;

/**
 * Class m230328_052924_create_user_passwords
 */
class m230328_052924_create_user_passwords extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_passwords}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'username' => $this->string(),
            'password' => $this->string(),
            'company_name' => $this->string()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_passwords}}');
    }
}
