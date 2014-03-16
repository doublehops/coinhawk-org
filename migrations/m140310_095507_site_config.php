<?php

use yii\db\Schema;

class m140310_095507_site_config extends \yii\db\Migration
{
	public function up()
	{
        $this->createTable('site_config', [
                'id' => 'INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "Index"',
                'send_notifications' => 'TINYINT(1) NOT NULL DEFAULT 1  COMMENT "Exchange name"',
                'created_at' => 'DATETIME COMMENT "Record created time"',
                'updated_at' => 'DATETIME COMMENT "Record last updated time"',
            ],  'ENGINE=InnoDB CHARSET utf8 COMMENT "Table of markets"'
        );

        $this->insert('site_config', [
                'id' => 1,
                'send_notifications' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
	}

	public function down()
	{
        $this->dropTable('site_config');
	}
}
