<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit766749dbac485cd67baaad9e47f9a823
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit766749dbac485cd67baaad9e47f9a823::$classMap;

        }, null, ClassLoader::class);
    }
}