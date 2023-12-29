<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd3d8456cc61fe034dc7d1f0d9a4a52bf
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitd3d8456cc61fe034dc7d1f0d9a4a52bf', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd3d8456cc61fe034dc7d1f0d9a4a52bf', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd3d8456cc61fe034dc7d1f0d9a4a52bf::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
