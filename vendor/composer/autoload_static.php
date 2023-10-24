<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d9508c386ea27d3e3e6cab16b795891
{
    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'dinhub\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'dinhub\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d9508c386ea27d3e3e6cab16b795891::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d9508c386ea27d3e3e6cab16b795891::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d9508c386ea27d3e3e6cab16b795891::$classMap;

        }, null, ClassLoader::class);
    }
}
