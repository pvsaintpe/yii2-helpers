<?php

namespace pvsaintpe\helpers;

use kartik\helpers\Html as BaseHtml;

/**
 * Class Html
 * @package pvsaintpe\helpers\components
 */
class Html extends BaseHtml
{
    /**
     * @param string $name
     * @return string
     */
    public static function glyphIcon($name)
    {
        return static::tag('span', '', ['class' => 'glyphicon glyphicon-' . $name]);
    }

    /**
     * @return string
     */
    public static function glyphIconPlus()
    {
        return static::glyphIcon('plus');
    }

    /**
     * @return string
     */
    public static function glyphIconPencil()
    {
        return static::glyphIcon('pencil');
    }

    /**
     * @return string
     */
    public static function glyphIconMove()
    {
        return static::glyphIcon('move');
    }

    /**
     * @return string
     */
    public static function glyphIconFlag()
    {
        return static::glyphIcon('flag');
    }

    /**
     * @return string
     */
    public static function glyphIconEyeOpen()
    {
        return static::glyphIcon('eye-open');
    }

    /**
     * @return string
     */
    public static function glyphIconList()
    {
        return static::glyphIcon('list');
    }

    /**
     * @return string
     */
    public static function glyphIconFloppyDisk()
    {
        return static::glyphIcon('floppy-disk');
    }

    /**
     * @return string
     */
    public static function glyphIconFlash()
    {
        return static::glyphIcon('flash');
    }

    /**
     * @return string
     */
    public static function glyphIconFilter()
    {
        return static::glyphIcon('filter');
    }

    /**
     * @return string
     */
    public static function glyphIconTrue()
    {
        return static::glyphIcon('ok text-success');
    }

    /**
     * @return string
     */
    public static function glyphIconFalse()
    {
        return static::glyphIcon('remove text-danger');
    }

    /**
     * @return string
     */
    public static function glyphIconDownload()
    {
        return static::glyphIcon('download-alt');
    }

    /**
     * @return string
     */
    public static function glyphIconRemove()
    {
        return static::glyphIcon('remove');
    }

    /**
     * @param bool $value
     * @return string
     */
    public static function glyphIconBool($value)
    {
        return $value ? static::glyphIconTrue() : static::glyphIconFalse();
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function defaultButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-default btn-sm'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function primaryButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-primary btn-sm'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function successButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-success btn-sm'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function infoButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-info btn-sm'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function dangerButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-danger btn-sm'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function defaultXSButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-default btn-xs'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function primaryXSButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-primary btn-xs'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function successXSButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-success btn-xs'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function infoXSButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-info btn-xs'], $options)
        );
    }

    /**
     * @param string $content
     * @param [] $to
     * @param [] $options
     * @return string
     */
    public static function dangerXSButton($content, $to, $options = [])
    {
        return static::a(
            $content,
            $to,
            array_merge(['class' => 'btn btn-danger btn-xs'], $options)
        );
    }

    /**
     * @param $entity
     * @param $title
     * @return string
     */
    public static function tooltip($entity, $title)
    {
        return '<span data-toggle="tooltip" title="' . $title . '">' . $entity . '</span>';
    }
}
