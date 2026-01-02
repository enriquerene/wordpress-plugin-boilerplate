<?php
/*
 * Plugin Name:       WP Plugin Boilerplate
 * Plugin URI:        https://github.com/enriquerene/wordpress-plugin-boilerplate
 * Description:       A dev friendly boilerplate for WordPress plugins.
 * Version:           1.0.0
 * Author:            Enrique René Beauxis Reyes
 * Author URI:        https://www.enriquerene.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

require_once __DIR__ . '/vendor/autoload.php';
if (!defined('WPPB_PLUGIN_BASENAME')) {
    define('WPPB_PLUGIN_BASENAME', plugin_basename(__FILE__));
}
if (!defined('WPPB_PLUGIN_DIR')) {
    define('WPPB_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

use WPPB\Core\AdminManager;
use WPPB\Core\Requirements;
use WPPB\Core\BlockManager;

class Plugin
{
    public static function init(): void
    {
        try {
            if (!Requirements::isMet()) {
                AdminManager::displayRequirementsError(Requirements::getErrors());
                return;
            }
            self::addActionToPluginCard();
            self::initializeAdmin();
            self::initializeBlocks();
//            self::initializeWooCommerce();
//            self::initializePublic();
//            self::initializeIntegrations();
        } catch (\Exception $e) {
            AdminManager::displayActivationError($e->getMessage());
            return;
        }
    }

    private static function addActionToPluginCard(): void
    {
        AdminManager::addActionToPluginCard();
    }

    private static function initializeAdmin(): void
    {
        AdminManager::addTopLevelMenuEntry();
        AdminManager::addTopFixedMenuItem();
    }

    private static function initializeBlocks(): void
    {
        BlockManager::init();
    }
}

add_action('plugins_loaded', fn() => Plugin::init());