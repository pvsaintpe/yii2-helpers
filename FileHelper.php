<?php

namespace pvsaintpe\helpers;

/**
 * Class FileHelper
 * @package pvsaintpe\helpers
 */
class FileHelper
{
    /**
     * Создает временный файл
     * @param bool $autoDelete
     * @return string
     */
    public static function temp($autoDelete = true): string
    {
        $tmp = tempnam(sys_get_temp_dir(), '');
        if ($autoDelete) {
            register_shutdown_function(function () use ($tmp) {
                unlink($tmp);
            });
        }
        return $tmp;
    }

    /**
     * Создает временную директорию
     * @param int $mode
     * @param bool $autoDelete
     * @return string
     */
    public static function tempDir(int $mode = 0700, bool $autoDelete = true): string
    {
        do {
            $tmp = tempnam(sys_get_temp_dir(), '');
            if (file_exists($tmp)) {
                unlink($tmp);
            }
        } while (!@mkdir($tmp, $mode));
        if ($autoDelete) {
            register_shutdown_function(function () use ($tmp) {
                static::destroyDir($tmp);
            });
        }
        return $tmp;
    }

    /**
     * @param string $dir
     * @return bool
     */
    public static function destroyDir(string $dir): bool
    {
        if (!is_dir($dir)) {
            return false;
        }
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            if (is_dir("$dir/$file")) {
                static::destroyDir("$dir/$file");
            } else {
                unlink("$dir/$file");
            }
        }
        return rmdir($dir);
    }
}
