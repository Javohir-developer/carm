<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m130523_201441_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companies}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'photo_companies' => $this->json(),
            'logo' => $this->string(),
            'currency' => $this->string(),
            'address_ru' => $this->string(),
            'address_uz' => $this->string(),
            'latitude' => $this->string(),
            'longitude' => $this->string(),
            'working_mode' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->bigInteger(),
            'telegram' => $this->string(),
            'facebook' => $this->string(),
            'instagram' => $this->string(),
            'about' => $this->text(),
            'companies_type' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%companies}}');
    }
}
