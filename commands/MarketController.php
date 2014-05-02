<?php

namespace app\commands;

use app\models\Exchange;
use app\models\Market;
use yii\console\Controller;

class MarketController extends Controller
{
    /**
     * Fetch market data from Cryptsy
     */
    public function actionFetchData()
    {
        $exchanges = Exchange::find()->all();

        foreach($exchanges as $exchange) {
            $data = \Yii::$app->{$exchange->component}->getMarketData(); 

            Market::updateData($exchange, $data);
        }
    }
}
