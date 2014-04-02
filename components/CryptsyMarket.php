<?php

namespace app\components;

class CryptsyMarket extends \yii\base\Component
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

    protected function fetchData()
    {
        static $ch = null;
        if (is_null($ch)) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; Cryptsy API PHP client; '.php_uname('s').'; PHP/'.phpversion().')');
        }
        curl_setopt($ch, CURLOPT_URL, 'http://pubapi.cryptsy.com/api.php');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['method'=>'marketdatav2']));
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
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
