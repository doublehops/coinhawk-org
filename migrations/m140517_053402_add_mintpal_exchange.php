<?php

use yii\db\Schema;

class m140517_053402_add_mintpal_exchange extends \yii\db\Migration
{
    public function up()
    {
        $this->insert('exchange', ['id' => 2,
                                   'name' => 'Mintpal',
                                   'component' => 'MintpalMarket',
                                   'url' => 'https://www.mintpal.com',
                                   'market_page_url' => 'https://www.mintpal.com/market/<id>',
                                  ]
        );
    }

    public function down()
    {
        $this->delete('exchange', ['id' => 2]);
    }
}
