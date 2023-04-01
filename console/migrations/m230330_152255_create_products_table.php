<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m230330_152255_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'company_id' => $this->integer(),

            'warehouse_id' => $this->integer(),
            'supplier_id' => $this->integer(),
            'date' => $this->date(),
            'currency' => $this->integer(),
            'currency_amount' => $this->integer(),


            'barcode' => $this->integer(),
            'group' => $this->integer(),
            'type' => $this->string(),
            'model' => $this->string(),
            'brand' => $this->string(),
            'size' => $this->string(),
            'ikpu' => $this->bigInteger(),

            'unit_amount' => $this->integer(),
            'max_ast' => $this->integer(),
            'min_ast' => $this->integer(),

            'production_time' => $this->date(),
            'term_amount' => $this->integer(),
            'term_type' => $this->integer(),
            'valid' => $this->time(),

            'ndc' => $this->integer(),
            'entry_price' => $this->integer(),
            'evaluation' => $this->float(),
            'exit_price' => $this->integer(),
            'old_entry_price' => $this->integer(),
            'old_evaluation' => $this->float(),
            'old_exit_price' => $this->integer(),

            'unit_type' => $this->integer(),
            'amount' => $this->integer(),

            'input_status' => $this->integer()->notNull()->defaultValue(1),

            'status' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->addForeignKey('fk_products_companies',  'products', 'company_id', 'companies', 'id');
        $this->addForeignKey('fk_products_user',  'products', 'user_id', 'user', 'id');
        $this->addForeignKey('fk_products_warehouses',  'products', 'warehouse_id', 'warehouses', 'id');
        $this->addForeignKey('fk_products_suppliers',  'products', 'supplier_id', 'suppliers', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}