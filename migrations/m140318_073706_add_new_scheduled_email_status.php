<?php

use yii\db\Schema;

class m140318_073706_add_new_scheduled_email_status extends \yii\db\Migration
{
	public function up()
	{
        $this->execute("ALTER TABLE scheduled_email_task CHANGE COLUMN status status ENUM('idle','scheduled','completed','cancelled') DEFAULT 'idle'");
	}

	public function down()
	{
        $this->execute("ALTER TABLE scheduled_email_task CHANGE COLUMN status status ENUM('scheduled','completed','cancelled')");
	}
}
