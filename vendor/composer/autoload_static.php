<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2a5b6774c9bf6e9782b386c1c1516cfa
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\CursoPdo\\Infrastructure\\Repository\\' => 41,
            'Alura\\CursoPdo\\Infrastructure\\Persistence\\' => 42,
            'Alura\\CursoPdo\\Domain\\Repository\\' => 33,
            'Alura\\CursoPdo\\Domain\\Model\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\CursoPdo\\Infrastructure\\Repository\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Infrastructure/Repository',
        ),
        'Alura\\CursoPdo\\Infrastructure\\Persistence\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Infrastructure/Persistence',
        ),
        'Alura\\CursoPdo\\Domain\\Repository\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Domain/Repository',
        ),
        'Alura\\CursoPdo\\Domain\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Domain/Model',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2a5b6774c9bf6e9782b386c1c1516cfa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2a5b6774c9bf6e9782b386c1c1516cfa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2a5b6774c9bf6e9782b386c1c1516cfa::$classMap;

        }, null, ClassLoader::class);
    }
}
