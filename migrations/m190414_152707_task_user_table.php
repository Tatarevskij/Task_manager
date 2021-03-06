<?php

use yii\db\Migration;

/**
 * Class m190414_152707_task_user_table
 */
class m190414_152707_task_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this ->createTable('task_user', [
            'id' => $this -> primaryKey(),
            'task_id' => $this -> integer() -> notNull(),
            'user_id' => $this -> integer() -> notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropTable('task_user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190414_152707_task_user_table cannot be reverted.\n";

        return false;
    }
    */
}
