<?php

namespace WPPB\Core;

use WPPB\Services\UI;
use WPPB\Services\I18n;

class AdminManager
{
    const MENU_ICON = 'dashicons-store';

    public static function displayRequirementsError($getErrors): void
    {
        foreach ($getErrors as $error) {
            echo UI::noticeError($error);
        }
    }

    public static function displayActivationError(string $message): void
    {
        echo UI::noticeError($message);
    }

    public static function addTopLevelMenuEntry(): void
    {
        add_action('admin_menu', fn() => add_menu_page(
            Constants::PLUGIN_NAME,
            Constants::PLUGIN_NAME,
            'manage_options',
            Constants::PLUGIN_BASE_NAME,
            fn() => self::renderAdminPage(),
            self::MENU_ICON,
            // Place right before WooCommerce (which uses 55.5)
            55.4
        ));
    }

    public static function renderAdminPage(): void
    {
        $authorLink = [
            'text' => 'Enrique René',
            'url' => 'https://enriquerene.com.br',
        ];
        $description = sprintf(
            'Welcome to %s! This plugin is developed by %s to provide a solid boilerplate for your WordPress projects.',
            Constants::PLUGIN_NAME,
            UI::link($authorLink)
        );
        echo UI::pageContainer([
            UI::pageTitle(Constants::PLUGIN_NAME),
            UI::description(I18n::text($description)),
            UI::grid([
                UI::featureCard([
                    'title' => I18n::text('Modular Architecture'),
                    'description' => I18n::text('Built with a clean, modular structure following WordPress best practices.'),
                    'icon' => 'dashicons-rest-api',
                ]),
                UI::featureCard([
                    'title' => I18n::text('Easy Customization'),
                    'description' => I18n::text('Easily extend and customize the boilerplate to fit your specific needs.'),
                    'icon' => 'dashicons-admin-tools',
                ]),
                UI::featureCard([
                    'title' => I18n::text('I18n Ready'),
                    'description' => I18n::text('Complete internationalization support out of the box.'),
                    'icon' => 'dashicons-translation',
                ]),
                UI::featureCard([
                    'title' => I18n::text('Developer Friendly'),
                    'description' => I18n::text('Designed for developers with a focus on code quality and readability.'),
                    'icon' => 'dashicons-code-standards',
                ]),
                UI::featureCard([
                    'title' => I18n::text('Docker Ready'),
                    'description' => I18n::text('Includes a complete Docker environment (PHP & Node.js) with hot reloading for both PHP and Gutenberg blocks.'),
                    'icon' => 'dashicons-cloud',
                ]),
                UI::featureCard([
                    'title' => I18n::text('Facade Pattern'),
                    'description' => I18n::text('Utilizes the Facade pattern for a cleaner and more intuitive API.'),
                    'icon' => 'dashicons-editor-code',
                ]),
                UI::featureCard([
                    'title' => I18n::text('Composer Based'),
                    'description' => I18n::text('Fully managed by Composer for seamless dependency management and autoloading.'),
                    'icon' => 'dashicons-performance',
                ]),
                UI::featureCard([
                    'title' => I18n::text('Gutenberg Ready'),
                    'description' => I18n::text('Modern block development support integrated with @wordpress/scripts and Storybook isolation.'),
                    'icon' => 'dashicons-block-default',
                ]),
            ])
        ]);

    }

    public static function addTopFixedMenuItem(): void
    {
        add_action('admin_bar_menu', function ($wp_admin_bar) {
            if (is_admin()) {
                return;
            }
            $wp_admin_bar->add_node([
                'id' => Constants::PLUGIN_BASE_NAME,
                'title' => '<span class="' . self::MENU_ICON . '"></span> ' . Constants::PLUGIN_NAME,
                'href' => admin_url('?page=' . Constants::PLUGIN_BASE_NAME),
                'meta' => ['class' => Constants::PLUGIN_BASE_NAME],
            ]);
        }, 999);
    }

    public static function addActionToPluginCard()
    {
        // Use the main plugin file basename; using __FILE__ here would point to this class file and never match
        $plugin_basename = defined('WPPB_PLUGIN_BASENAME') ? WPPB_PLUGIN_BASENAME : plugin_basename(dirname(__DIR__, 2) . '/plugin-name.php');

        add_filter('plugin_action_links_' . $plugin_basename, function (array $links): array {
            $url = admin_url('?page=' . Constants::PLUGIN_BASE_NAME);
            $links['manage'] = UI::link([
                'url' => $url,
                'text' => I18n::text('Manage'),
            ]);

            return $links;
        });
    }
}