<?php

namespace pvsaintpe\helpers;

use yii\helpers\ArrayHelper as ArrayHelperBase;
use Exception;
use Closure;

/**
 * Class ArrayHelper
 *
 * @author Pavel Veselov <pvsaintpe@icloud.com>
 *
 * @package pvsaintpe\helpers
 * @since 1.0
 */
class ArrayHelper extends ArrayHelperBase
{
    /**
     * @param Closure $func
     * @example ```php
     *
     * $a = [1, 2, 3];
     * $b = [1, 2, 3, 4];
     * $c = [1, 2, 3, 4, 5];
     *
     * // Example 1
     * $func = function ($a1, $b1, $c1) {
     *    echo join('.', [$a1, $b1, $c1]) . PHP_EOL;
     * }
     * EachHelper::each($func, $a, $b, $c);
     *
     * echo '******* divider *******' . PHP_EOL;
     *
     * // Example 2
     * foreach ($a as $a1) {
     *     foreach ($b as $b1) {
     *         foreach ($c as $c1) {
     *             call_user_func_array($func, [$a1, $b1, $c1]);
     *         }
     *     }
     * }
     *
     * // The output for both examples will be identical.
     * ```
     * @param array $array1
     * @param array $_ [optional]
     * @throws Exception
     */
    public static function each(Closure $func, array $array1, array $_ = null)
    {
        if (!$func instanceof Closure) {
            throw new Exception('First argument must me callable function: ' . gettype($func));
        }
        $args = static::getEachParams(func_get_args());
        $items = array_shift($args);
        static::eachItems($func, count($args) + 1, $items, $args);
    }

    /**
     * Check arguments for valid & get Params for each
     * @param array $args
     * @return array $params
     * @throws Exception
     */
    private static function getEachParams(array $args)
    {
        if (count($args) < 2) {
            throw new \Exception('Required two or more arguments: ' . count($args));
        }
        $params = array_slice($args, 1, null, true);
        foreach ($params as $param) {
            if (!is_array($param)) {
                throw new Exception('Unsupported operand types: ' . gettype($param));
            }
        }
        return $params;
    }

    /**
     * Recursive traversal of all arrays
     * @param Closure $func
     * @param int $countParams
     * @param array $items
     * @param array $childItems []
     * @param array $params []
     */
    private static function eachItems(Closure $func, $countParams, array $items, array $childItems = [], array $params = [])
    {
        $targetItems = array_shift($childItems);
        foreach ($items as $item) {
            $funcParams = array_merge($params, [$item]);
            if (count($funcParams) === $countParams) {
                call_user_func_array($func, $funcParams);
                continue;
            }
            static::eachItems($func, $countParams, $targetItems, $childItems, array_merge($params, [$item]));
        }
    }
}