<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitefd44bd1196bd341d8dab207adf99652
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

        spl_autoload_register(array('ComposerAutoloaderInitefd44bd1196bd341d8dab207adf99652', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitefd44bd1196bd341d8dab207adf99652', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitefd44bd1196bd341d8dab207adf99652::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
