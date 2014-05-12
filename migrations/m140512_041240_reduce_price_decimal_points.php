<?php

use yii\db\Schema;

class m140512_041240_reduce_price_decimal_points extends \yii\db\Migration
{
    public function up()
    {
        $this->alterColumn('market', 'last_trade_price', 'DECIMAL(25,8) NOT NULL');
        $this->alterColumn('market_history', 'price', 'DECIMAL(25,8) NOT NULL');
    }

    public function down()
    {
        $this->alterColumn('market', 'last_trade_price', 'DECIMAL(25,9) NOT NULL');
        $this->alterColumn('market_history', 'price', 'DECIMAL(25,9) NOT NULL');
    }
}
