<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m220907_174241_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'region_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('fk_city_region',  'city', 'region_id', 'region', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
