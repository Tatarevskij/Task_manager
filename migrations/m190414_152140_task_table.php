<?php

use yii\db\Migration;

/**
 * Class m190414_152140_task_table
 */
class m190414_152140_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this ->createTable('task', [
            'id' => $this -> primaryKey(),
            'title' => $this -> string(255) -> notNull(),
            'description' => $this -> text() -> notNull(),
            'creator_id' => $this -> integer() -> notNull(),
            'updater_id' => $this -> integer(),
            'created_at' => $this -> integer() -> notNull(),
            'updated_at' => $this -> integer(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropTable('task');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190414_152140_task_table cannot be reverted.\n";

        return false;
    }
    */
}
