<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client`.
 */
class m181212_190440_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'mid_name' => $this->string(100)->defaultValue(null),
            'passport' => $this->string(20)->defaultValue(null),
            'comment' => $this->text()->defaultValue(null),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('client');
    }
}
