<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3d8456cc61fe034dc7d1f0d9a4a52bf
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Intervention\\Image\\' => 19,
            'Intervention\\Gif\\' => 17,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Intervention\\Image\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/image/src',
        ),
        'Intervention\\Gif\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/gif/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3d8456cc61fe034dc7d1f0d9a4a52bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3d8456cc61fe034dc7d1f0d9a4a52bf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3d8456cc61fe034dc7d1f0d9a4a52bf::$classMap;

        }, null, ClassLoader::class);
    }
}
