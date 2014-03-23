<?php

namespace app\components;

class TimeHelper extends \Yii\base\Object
{
    const DAYS = 86400;

    public function init()
    {
        parent::init();
    }

    public static function last7Days()
    {
        return [date('Y-m-d H:i:s', time() - 7*self::DAYS), date('Y-m-d H:i:s')];
    }
}
