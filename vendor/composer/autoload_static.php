<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita379fcd21696334e2574095adc6cf4dd
{
    public static $classMap = array (
        'midgardmvc_helper_urlize' => __DIR__ . '/..' . '/midgard/midgardmvc-helper-urlize/interface.php',
        'midgardmvc_helper_urlize_tests_interface' => __DIR__ . '/..' . '/midgard/midgardmvc-helper-urlize/tests/interfaceTest.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInita379fcd21696334e2574095adc6cf4dd::$classMap;

        }, null, ClassLoader::class);
    }
}
