<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitec3d4ff5af18b212ce0cf09433ac6b31
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AmoCRM\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AmoCRM\\' => 
        array (
            0 => __DIR__ . '/..' . '/dotzero/amocrm/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitec3d4ff5af18b212ce0cf09433ac6b31::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitec3d4ff5af18b212ce0cf09433ac6b31::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
