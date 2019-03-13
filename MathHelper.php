<?php

namespace pvsaintpe\helpers;

use yii\base\InvalidValueException;

/**
 * Class MathHelper
 * @package pvsaintpe\helpers
 */
class MathHelper
{

    /**
     * @param int[]|float[] $values
     * @return int[]
     */
    public static function getPercents(array $values)
    {
        if (!count($values)) {
            return [];
        }
        $totalValue = array_sum($values);
        if ($totalValue == 0) {
            return array_fill_keys(array_keys($values), 0);
        }
        $percents = [];
        $roundPercents = [];
        foreach ($values as $i => $value) {
            if ($value < 0) {
                throw new InvalidValueException('Negative value.');
            }
            $percent = $value / $totalValue * 100;
            $percents[$i] = $percent;
            $roundPercents[$i] = (int)round($percent);
        }
        $totalPercent = array_sum($roundPercents);
        if ($totalPercent != 100) {
            uasort($percents, function ($p1, $p2) {
                $f1 = abs($p1 - floor($p1) - 0.5);
                $f2 = abs($p2 - floor($p2) - 0.5);
                return $f1 <=> $f2;
            });
            $difference = 100 - $totalPercent;
            $unit = $difference <=> 0;
            foreach ($percents as $i => $percent) {
                $roundPercents[$i] += $unit;
                $difference -= $unit;
                if ($difference == 0) {
                    break;
                }
            }
        }
        return $roundPercents;
    }

    /**
     * @param int[]|float[] $values
     * @param int $precision
     * @return string[]
     */
    public static function getPercentsWithPrecision(array $values, $precision)
    {
        if (!is_int($precision) || ($precision < 1)) {
            throw new InvalidValueException('Invalid precision.');
        }
        if (!count($values)) {
            return [];
        }
        $totalValue = array_sum($values);
        if ($totalValue == 0) {
            return array_fill_keys(array_keys($values), 0);
        }
        $percents = [];
        $roundPercents = [];
        $pow = pow(10, $precision);
        foreach ($values as $i => $value) {
            if ($value < 0) {
                throw new InvalidValueException('Negative value.');
            }
            $percent = $value / $totalValue * 100;
            $percents[$i] = $percent;
            $roundPercents[$i] = (int)round($percent * $pow);
        }
        $totalPercent = array_sum($roundPercents);
        $sum = pow(10, 2 + $precision);
        if ($totalPercent != $sum) {
            uasort($percents, function ($p1, $p2) {
                $f1 = abs($p1 - floor($p1) - 0.5);
                $f2 = abs($p2 - floor($p2) - 0.5);
                return $f1 <=> $f2;
            });
            $difference = $sum - $totalPercent;
            $unit = $difference <=> 0;
            foreach ($percents as $i => $percent) {
                $roundPercents[$i] += $unit;
                $difference -= $unit;
                if ($difference == 0) {
                    break;
                }
            }
        }
        $format = '%.' . $precision . 'f';
        foreach ($roundPercents as $i => $roundPercent) {
            $roundPercents[$i] = sprintf($format, $roundPercent / $pow);
        }
        return $roundPercents;
    }
}
