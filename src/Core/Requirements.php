<?php

namespace WPPB\Core;

class Requirements
{
    private static array $requirements = [
        'php_version' => '7.4',
        'wp_version'  => '5.6',
        'wc_version'  => '5.0',
        'extensions'  => ['json', 'curl'],
    ];

    private static array $errors = [];

    public static function isMet(): bool
    {
        self::checkPHPVersion();
        self::checkWordPressVersion();
//        self::checkWooCommerce();
        self::checkExtensions();

        return empty(self::$errors);
    }

    public static function getErrors(): array
    {
        return self::$errors;
    }

    private static function checkPHPVersion(): void
    {
        if (version_compare(PHP_VERSION, self::$requirements['php_version'], '<')) {
            self::$errors[] = 'PHP version must be at least ' . self::$requirements['php_version'];
        }
    }

    private static function checkWordPressVersion(): void
    {
        if (version_compare(WordPressManager::getVersion(), self::$requirements['wp_version'], '<')) {
            self::$errors[] = 'WordPressManager version must be at least ' . self::$requirements['wp_version'];
        }
    }

    private static function checkWooCommerce(): void
    {
        if (!WooCommerceManager::isActive()) {
            self::$errors[] = 'WooCommerce must be installed and activated';
        } else {
            if (version_compare(WooCommerceManager::getVersion(), self::$requirements['wc_version'], '<')) {
                self::$errors[] = 'WooCommerce version must be at least ' . self::$requirements['wc_version'];
            }
        }
        WooCommerceManager::helloToMyFriend('Nardi');
    }

    private static function checkExtensions(): void
    {
    }
}