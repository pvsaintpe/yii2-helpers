<?php

namespace pvsaintpe\helpers;

/**
 * Class Inflector
 * @package pvsaintpe\helpers
 */
class Inflector extends \yii\helpers\Inflector
{
    /**
     * Convert "App-Id" to "checkAppId"
     * @param string $name
     * @return string
     */
    public static function checkify($name)
    {
        return 'check' . ucfirst(static::id2camel($name));
    }

    /**
     * Convert "App-Id" to "getApp"
     * @param string $name
     * @return string
     */
    public static function gettify($name)
    {
        return 'get' . ucfirst(str_replace(['-Id', 'Id'], '', static::id2camel($name)));
    }

    /**
     * Convert "App-Id" to "app"
     * @param string $name
     * @return string
     */
    public static function relatify($name)
    {
        return lcfirst(str_replace(['-Id', 'Id'], '', static::id2camel($name)));
    }

    /**
     * Convert "App-Id" to "initApp"
     * @param string $name
     * @return string
     */
    public static function initify($name)
    {
        return 'init' . ucfirst(str_replace(['-Id', 'Id'], '', static::id2camel($name)));
    }
}
