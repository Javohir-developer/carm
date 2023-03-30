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
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%suppliers}}');
    }
}
