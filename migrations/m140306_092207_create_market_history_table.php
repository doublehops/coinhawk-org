<?php

use yii\db\Schema;

class m140306_092207_create_market_history_table extends \yii\db\Migration
{
	public function up()
	{
        $this->createTable('market_history', [
                'id' => 'INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "Index"',
                'market_id' => 'INT(10) UNSIGNED NOT NULL COMMENT "Cryptsy market id"',
                'price' => 'DECIMAL(25,9) NOT NULL COMMENT "Last traded price"',
                'created_at' => 'DATETIME COMMENT "Record created time"',
                'updated_at' => 'DATETIME COMMENT "Record last updated time"',
            ],  'ENGINE=InnoDB CHARSET utf8 COMMENT "Table of market history"'
        );

        $this->addForeignKey('fk_markethistory_market', 'market_history', 'market_id', 'market', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
        $this->dropForeignKey('fk_markethistory_market', 'market_history');
        $this->dropTable('market_history');
	}
}
