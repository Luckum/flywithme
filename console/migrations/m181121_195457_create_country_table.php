<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m181121_195457_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'code' => $this->string(3)->notNull(),
            'name_en' => $this->string()->notNull(),
            'name_ru' => $this->string()->defaultValue(null),
            'name_fr' => $this->string()->defaultValue(null),
            'name_de' => $this->string()->defaultValue(null),
            'currency' => $this->string(3)->notNull(),
            'name_translations' => $this->text()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('country');
    }
}
