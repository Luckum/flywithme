<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m181121_213024_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer(11)->notNull(),
            'code' => $this->string(3)->notNull(),
            'name_en' => $this->string()->notNull(),
            'name_ru' => $this->string()->defaultValue(null),
            'name_fr' => $this->string()->defaultValue(null),
            'name_de' => $this->string()->defaultValue(null),
            'coordinates_lon' => $this->decimal(11, 8)->defaultValue(null),
            'coordinates_lat' => $this->decimal(11, 8)->defaultValue(null),
            'time_zone' => $this->string(100)->notNull(),
            'name_translations' => $this->text()->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey('city_ibfk_country', '{{%city}}', 'country_id', '{{%country}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('city');
    }
}
