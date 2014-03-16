<?php

use yii\db\Schema;

class m140306_074040_create_exchange_table extends \yii\db\Migration
{
	public function up()
	{
        $this->createTable('exchange', [
                'id' => 'INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "Index"',
                'name' => 'VARCHAR(25) NOT NULL COMMENT "Exchange name"',
                'component' => 'VARCHAR(100) NOT NULL COMMENT "Component name to be instantiated"',
                'url' => 'VARCHAR(100) COMMENT "URL to website home page"',
                'created_at' => 'DATETIME COMMENT "Record created time"',
                'updated_at' => 'DATETIME COMMENT "Record last updated time"',
            ],  'ENGINE=InnoDB CHARSET utf8 COMMENT "Table of markets"'
        );

        $this->insert('exchange', [
                'id' => 1,
                'name' => 'Cryptsy',
                'component' => 'cryptsyMarket',
                'url' => 'http://cryptsy.com',
            ]
        );
	}

	public function down()
	{
        $this->dropTable('exchange');
	}
}
