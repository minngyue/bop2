<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%api}}`.
 */
class m200110_033329_create_api_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%api}}', [
            'id' => $this->primaryKey(),
            'encode_id' => $this->string(50)->notNull(),
            'project_id' => $this->integer(10)->notNull(),
            'module_id' => $this->integer(10),
            'title' => $this->string(250),
            'content'=>$this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%api}}');
    }
}
