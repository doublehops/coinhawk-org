<?php

use yii\db\Schema;

class m140306_092110_create_market_table extends \yii\db\Migration
{
	public function up()
	{
        $this->createTable('market', [
                'id' => 'INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "Index"',
                'exchange_id'  => 'INT(10) UNSIGNED NOT NULL COMMENT "Exchange market id"',
                'market_id' => 'INT(10) UNSIGNED NOT NULL COMMENT "Market id"',
                'label' => 'VARCHAR(20) NOT NULL COMMENT "Market code/labl"',
                'last_trade_price' => 'DECIMAL(25,9) NOT NULL COMMENT "Last traded price"',
                'volume' => 'DECIMAL(25,9) NOT NULL COMMENT "Volume"',
                'last_trade_time' => 'DATETIME COMMENT "Last traded time"',
                'primary_name' => 'VARCHAR(50) COMMENT "Name"',
                'primary_code' => 'VARCHAR(10) COMMENT ""',
                'secondary_name' => 'VARCHAR(50) COMMENT ""',
                'secondary_code' => 'VARCHAR(10) COMMENT ""',
                'created_at' => 'DATETIME COMMENT "Record created time"',
                'updated_at' => 'DATETIME COMMENT "Record last updated time"',
            ],  'ENGINE=InnoDB CHARSET utf8 COMMENT "Table of markets"'
        );

        $this->addForeignKey('fk_market_exchange', 'market', 'exchange_id', 'exchange', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
        $this->dropForeignKey('fk_market_exchange', 'market');
        $this->dropTable('market');
	}
}
