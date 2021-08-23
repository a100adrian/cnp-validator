<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c8b83d510ef3d4bf7aa6961a6d0b234
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1c8b83d510ef3d4bf7aa6961a6d0b234::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1c8b83d510ef3d4bf7aa6961a6d0b234::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1c8b83d510ef3d4bf7aa6961a6d0b234::$classMap;

        }, null, ClassLoader::class);
    }
}
