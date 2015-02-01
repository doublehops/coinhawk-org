<?php

use yii\db\Schema;

class m150130_002600_add_exchange_status_column extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('exchange', 'active', 'TINYINT(4) NOT NULL DEFAULT 1 AFTER market_page_url');
    }

    public function down()
    {
        $this->dropColumn('exchange', 'active');
    }
}
