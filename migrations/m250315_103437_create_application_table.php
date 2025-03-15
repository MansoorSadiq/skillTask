<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m250315_103437_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
 //Mansoor - 15-2-25 - initializing columns
 public function safeUp()
 {
     $this->createTable('{{%application}}', [
         'id' => $this->primaryKey(),
         'first_name' => $this->string()->notNull(),
         'last_name' => $this->string()->notNull(),
         'date_of_birth' => $this->date()->notNull(),
         'description' => $this->text(),
         'income' => $this->decimal(10,2),
         'number_of_dependants' => $this->integer(),
         'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
         'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
     ]);
 }
//end - mansoor

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%application}}');
    }
}
