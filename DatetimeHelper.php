<?php

namespace pvsaintpe\helpers;

use Yii;

/**
 * Class DatetimeHelper
 * @package pvsaintpe\helpers
 */
class DatetimeHelper
{
    /**
     * @param $seconds
     * @return array
     */
    public static function seconds2times($seconds)
    {
        $times = array();
        $count_zero = false;
        $periods = array(60, 3600, 86400, 31536000);

        for ($i = 3; $i >= 0; $i--) {
            $period = floor($seconds/$periods[$i]);
            if (($period > 0) || ($period == 0 && $count_zero)) {
                $times[$i + 1] = $period;
                $seconds -= $period * $periods[$i];

                $count_zero = true;
            }
        }

        $times[0] = $seconds;

        return $times;
    }

    /**
     * @param array $times
     * @return string
     */
    public static function timesToStr($times)
    {
        $times_values = [
            Yii::t('calendar', 'сек.'),
            Yii::t('calendar', 'мин.'),
            Yii::t('calendar', 'ч.'),
            Yii::t('calendar', 'д.'),
            Yii::t('calendar', 'лет'),
        ];

        for ($i = count($times) - 1, $str = ''; $i >= 0; $i--) {
            $str .= $times[$i] . ' ' . $times_values[$i] . ' ';
        }

        return $str;
    }

    /**
     * @param array $times
     * @return string
     */
    public static function timesToTime($times)
    {
        for ($i = count($times) - 1, $str = ''; $i >= 0; $i--) {
            if ($str) {
                $str .= ':';
            }
            $str .= $times[$i];
        }

        return $str;
    }
}