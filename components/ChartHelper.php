<?php

namespace app\components;

use yii\helpers\BaseHtml;

class ChartHelper extends \Yii\base\Object
{
    public static function getTimePeriods()
    {
        return array(
            'last7Days' => 'Last 7 Days',
            'last30Days' => 'Last 30 Days',
        );    
    }

    public static function chartInput($input, $default, $chartType)
    {
        echo BaseHtml::dropDownList($input,
                                 $default,
                                 call_user_func('self::get'. $chartType),
                                 array(
                                     'class'=>'chart-input time-period',
                                 )
             );
    }
}
