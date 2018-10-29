<?php

namespace pvsaintpe\helpers;

/**
 * Class Url
 * @package backend\modules\performance\helpers
 */
class Url extends \yii\helpers\Url
{
    /**
     * @param null $url
     * @param array $removeParams
     * @param array $replaceParams
     * @return string
     */
    public static function modify($url = null, $removeParams = [], $replaceParams = [])
    {
        // parse url
        $parts = parse_url($url);

        $params = [];
        if (isset($parts['query'])) {
            parse_str($parts['query'], $params);
        }

        // removes
        foreach ($removeParams as $namespace => $namespaceParams) {
            if (is_array($namespaceParams)) {
                foreach ($namespaceParams as $param) {
                    if (isset($params[$namespace][$param])) {
                        unset($params[$namespace][$param]);
                    }
                }
            } else {
                if (isset($params[$namespaceParams])) {
                    unset($params[$namespaceParams]);
                }
            }
        }

        // replaces
        foreach ($replaceParams as $namespace => $namespaceParams) {
            if (is_array($namespaceParams)) {
                foreach ($namespaceParams as $param => $value) {
                    $params[$namespace][$param] = $value;
                }
            } else {
                $params[$namespace][$namespace] = $namespaceParams;
            }
        }

        // pack url
        $parts['query'] = http_build_query($params);

        $url = '';
        if (isset($parts['scheme'])) {
            $url .= $parts['scheme'] . '://';
        }
        if (isset($parts['host'])) {
            $url .= $parts['host'];
        }

        $url .= $parts['path'] . '?' . $parts['query'];

        return $url;
    }
}