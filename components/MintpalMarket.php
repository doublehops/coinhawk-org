<?php

namespace app\components;

class MintpalMarket extends \yii\base\Component
{
    public function init() {}

    /**
     * Get market data from Cryptsy
     *
     * @return JSON data
     */ 
    public function getMarketData()
    {
        $marketData = $this->fetchData();
//        $marketData = file_get_contents('/var/www/mintpal.json');
        $marketData = $this->formatJson($marketData);

        foreach($marketData->data as $key => $value) {

            $data[$key]['market_id'] = $value->market_id;
            $data[$key]['label'] = $value->code .'/'. $value->exchange;
            $data[$key]['primary_name'] = $value->code;
            $data[$key]['primary_code'] = $value->code;
            $data[$key]['secondary_name'] = $value->exchange;
            $data[$key]['secondary_code'] = $value->exchange;

            $data[$key]['last_trade_price'] = $value->last_price;
            $data[$key]['volume'] = 0;
            $data[$key]['last_trade_time'] = 0;
        }

        return $data;
    }

    protected function fetchData()
    {
        static $ch = null;
        if (is_null($ch)) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; Mintpal API PHP client; '.php_uname('s').'; PHP/'.phpversion().')');
        }
        curl_setopt($ch, CURLOPT_URL, 'https://api.mintpal.com/v2/market/summary/');
        // uncomment below to fetch via gzip
        // curl_setopt($ch,CURLOPT_ENCODING , "");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 
        // run the query
        $res = curl_exec($ch);

        return $res;
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
