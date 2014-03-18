<?php

use yii\db\Schema;

class m140318_120131_refactor_email extends \yii\db\Migration
{
	public function up()
	{
        $this->dropColumn('scheduled_email_task', 'to');
        $this->dropColumn('scheduled_email_task', 'to_name');

        $this->createTable('email_recipient', [
                'id' => 'INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "Index"',
                'email_id' => 'INT(10) UNSIGNED NOT NULL COMMENT "id of email"',
                'email' => 'VARCHAR(255) NOT NULL COMMENT "email address of recipient"',
                'name' => 'VARCHAR(255) NOT NULL COMMENT "name of recipient"',
                'created_at' => 'DATETIME COMMENT "Record created time"',
                'updated_at' => 'DATETIME COMMENT "Record last updated time"',
            ],  'ENGINE=InnoDB CHARSET utf8 COMMENT "Table of markets"'
        );
	}

	public function down()
	{
        $this->dropTable('email_recipient');

        $this->addColumn('scheduled_email_task', 'to', 'VARCHAR(255) NOT NULL COMMENT "To address" AFTER id');
        $this->addColumn('scheduled_email_task', 'to_name', 'VARCHAR(255) NOT NULL COMMENT "To Name" AFTER `to`');
	}
}
