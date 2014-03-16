<?php

use yii\db\Schema;

class m140307_085026_create_scheduled_email_table extends \yii\db\Migration
{
	public function up()
	{
        $this->createTable('scheduled_email_task', [
                'id' => 'INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "Index"',
                'to' => 'VARCHAR(255) NOT NULL COMMENT "Receiver\'s Email address"',
                'to_name' => 'VARCHAR(255) NOT NULL COMMENT "Receiver\'s name"',
                'from' => 'VARCHAR(255) NOT NULL COMMENT "Sender\'s name"',
                'from_name' => 'VARCHAR(255) NOT NULL COMMENT "Sender\'s name"',
                'subject' => 'VARCHAR(255) NOT NULL COMMENT "Email subject"', 
                'body' => 'MEDIUMTEXT NOT NULL COMMENT "Email subject"', 
                'status' => "ENUM('scheduled','completed','cancelled') NOT NULL COMMENT 'Current status of task'",
                'scheduled_at' => 'DATETIME COMMENT "scheduled time"',
                'created_at' => 'DATETIME COMMENT "Record created time"',
                'updated_at' => 'DATETIME COMMENT "Record last updated time"',
            ],  'ENGINE=InnoDB CHARSET utf8 COMMENT "Table of scheduled emails"'
        );
	}

	public function down()
	{
        $this->dropTable('scheduled_email_task');
	}
}
