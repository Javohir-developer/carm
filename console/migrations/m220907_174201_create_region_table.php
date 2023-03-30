<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m220907_174201_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->primaryKey(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%region}}');
    }
}
