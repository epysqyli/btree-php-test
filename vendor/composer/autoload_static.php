<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d3ef5f628aee805659e2587bf571f9a
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Braintree\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Braintree\\' => 
        array (
            0 => __DIR__ . '/..' . '/braintree/braintree_php/lib/Braintree',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d3ef5f628aee805659e2587bf571f9a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d3ef5f628aee805659e2587bf571f9a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d3ef5f628aee805659e2587bf571f9a::$classMap;

        }, null, ClassLoader::class);
    }
}
