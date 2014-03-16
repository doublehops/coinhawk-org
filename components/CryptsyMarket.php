<?php

namespace app\components;

class CryptsyMarket extends \yii\base\Component
{
    protected $_url = 'http://pubapi.cryptsy.com/api.php?method=marketdatav2';

    public function init() {}

    /**
     * Get market data from Cryptsy
     *
     * @return JSON data
     */ 
    public function getMarketData()
    {
        $marketData = file_get_contents($this->_url);
        //$marketData = file_get_contents('/var/www/marketdata.json');
        $marketData = $this->formatJson($marketData);

        $marketData = $marketData->return->markets;

        foreach($marketData as $key => $value) {

            $data[$key]['market_id'] = $value->marketid;
            $data[$key]['label'] = $value->label;
            $data[$key]['primary_name'] = $value->primaryname;
            $data[$key]['primary_code'] = $value->primarycode;
            $data[$key]['secondary_name'] = $value->secondaryname;
            $data[$key]['secondary_code'] = $value->secondarycode;

            $data[$key]['last_trade_price'] = $value->lasttradeprice;
            $data[$key]['volume'] = $value->volume;
            $data[$key]['last_trade_time'] = $value->lasttradetime;
        }

        return $data;
    }

    /**
     * Format JSON
     *
     * @param string $json data from Cryptsy
     *
     * @return JSON
     */
    protected function formatJson($json)
    {
        $json = str_replace('}, ]',"} ]",$json);

        $json = json_decode($json);

        return $json;
    }
}
