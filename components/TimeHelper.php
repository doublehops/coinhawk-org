<?php

namespace app\components;

class TimeHelper extends \Yii\base\Object
{
    const DAYS = 86400;

    public function init()
    {
        parent::init();
    }

    public static function last24Hours()
    {
        return [date('Y-m-d H:i:s', time() - 1*self::DAYS), date('Y-m-d H:i:s')];
    }

    public static function last7Days()
    {
        return [date('Y-m-d H:i:s', time() - 7*self::DAYS), date('Y-m-d H:i:s')];
    }

    public static function last30Days()
    {
        return [date('Y-m-d H:i:s', time() - 30*self::DAYS), date('Y-m-d H:i:s')];
    }

    public static function last90Days()
    {
        return [date('Y-m-d H:i:s', time() - 90*self::DAYS), date('Y-m-d H:i:s')];
    }
}
