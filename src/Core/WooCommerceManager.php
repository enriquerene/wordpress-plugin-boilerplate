<?php

namespace WPPB\Core;

class WooCommerceManager
{

    public static function isActive(): bool
    {
        return class_exists('WooCommerce');
    }

    public static function getVersion(): string
    {
        return defined('WC_VERSION') ? WC_VERSION : '';
    }

    public static function helloToMyFriend(string $string): string
    {
        return 'Hello friend ' . $string;
    }
}