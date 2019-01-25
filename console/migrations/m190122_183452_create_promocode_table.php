<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promocode`.
 */
class m190122_183452_create_promocode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('promocode', [
            'id' => $this->primaryKey(),
            'value' => $this->string(20)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'expire_at' => $this->dateTime()->defaultValue(null),
            'used_at' => $this->dateTime()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('promocode');
    }
}
