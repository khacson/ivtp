<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfcab3075d78c0cd59e740c491b9faa3f
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfcab3075d78c0cd59e740c491b9faa3f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfcab3075d78c0cd59e740c491b9faa3f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
