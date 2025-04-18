<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca31bd138cea34b77bc82c08b28e3279
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitca31bd138cea34b77bc82c08b28e3279::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca31bd138cea34b77bc82c08b28e3279::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitca31bd138cea34b77bc82c08b28e3279::$classMap;

        }, null, ClassLoader::class);
    }
}
