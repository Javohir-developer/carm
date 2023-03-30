<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%suppliers}}`.
 */
class m230330_083628_create_suppliers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%suppliers}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'company_id' => $this->integer(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'inn' => $this->integer(),
            'ndc' => $this->integer(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('fk_suppliers_companies',  'suppliers', 'company_id', 'companies', 'id');
        $this->addForeignKey('fk_suppliers_user',  'suppliers', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%suppliers}}');
    }
}
