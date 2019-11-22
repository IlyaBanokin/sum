<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd302e9292833105b616b36647ec6cb15
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'models\\' => 7,
        ),
        'l' => 
        array (
            'lib\\' => 4,
        ),
        'c' => 
        array (
            'core\\' => 5,
            'controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application/models',
        ),
        'lib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application/lib',
        ),
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application/core',
        ),
        'controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd302e9292833105b616b36647ec6cb15::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd302e9292833105b616b36647ec6cb15::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
