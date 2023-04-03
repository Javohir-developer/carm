<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%warehouses}}`.
 */
class m230330_085746_create_warehouses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%warehouses}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'type' => $this->integer(),
            'description' => $this->text(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->addForeignKey('fk_warehouses_companies',  'warehouses', 'company_id', 'companies', 'id');
        $this->addForeignKey('fk_warehouses_user',  'warehouses', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%warehouses}}');
    }
}
