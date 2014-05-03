<?php

use yii\db\Schema;

class m140503_012112_add_market_page_url_field extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('exchange', 'market_page_url', 'VARCHAR(255) AFTER url');
        $this->update('exchange', ['market_page_url'=>'https://www.cryptsy.com/markets/view/<id>'],['id'=>1]); 
    }

    public function down()
    {
        $this->dropColumn('exchange', 'market_page_url');
    }
}
