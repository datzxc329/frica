<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit042677a736d5ed98ee3098a6abae027a
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

        spl_autoload_register(array('ComposerAutoloaderInit042677a736d5ed98ee3098a6abae027a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit042677a736d5ed98ee3098a6abae027a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit042677a736d5ed98ee3098a6abae027a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}