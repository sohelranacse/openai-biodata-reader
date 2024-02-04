<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaad1972f97d4452691859671c2da440e
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Orhanerday\\OpenAi\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Orhanerday\\OpenAi\\' => 
        array (
            0 => __DIR__ . '/..' . '/orhanerday/open-ai/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaad1972f97d4452691859671c2da440e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaad1972f97d4452691859671c2da440e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaad1972f97d4452691859671c2da440e::$classMap;

        }, null, ClassLoader::class);
    }
}