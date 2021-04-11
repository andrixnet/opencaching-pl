<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2532e47646cbd0ac2fbb391e55b03321
{
    public static $files = array (
        '3917c79c5052b270641b5a200963dbc2' => __DIR__ . '/..' . '/kint-php/kint/init.php',
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
        'o' => 
        array (
            'okapi\\' => 6,
        ),
        'K' => 
        array (
            'Kint\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'okapi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/okapi',
        ),
        'Kint\\' => 
        array (
            0 => __DIR__ . '/..' . '/kint-php/kint/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPQRCode' => 
            array (
                0 => __DIR__ . '/..' . '/aferrandini/phpqrcode/lib',
            ),
        ),
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'OpenChecker\\OpenCheckerCore' => __DIR__ . '/../..' . '/modules/openchecker/openchecker_classes.php',
        'OpenChecker\\OpenCheckerSetup' => __DIR__ . '/../..' . '/modules/openchecker/openchecker_classes.php',
        'OpenChecker\\Pagination' => __DIR__ . '/../..' . '/modules/openchecker/openchecker_classes.php',
        'OpenChecker\\convertLongLat' => __DIR__ . '/../..' . '/modules/openchecker/openchecker_classes.php',
        'powerTrailBase' => __DIR__ . '/../..' . '/powerTrail/powerTrailBase.php',
        'powerTrailController' => __DIR__ . '/../..' . '/powerTrail/powerTrailController.php',
        'sendEmail' => __DIR__ . '/../..' . '/powerTrail/sendEmail.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2532e47646cbd0ac2fbb391e55b03321::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2532e47646cbd0ac2fbb391e55b03321::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit2532e47646cbd0ac2fbb391e55b03321::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit2532e47646cbd0ac2fbb391e55b03321::$classMap;

        }, null, ClassLoader::class);
    }
}