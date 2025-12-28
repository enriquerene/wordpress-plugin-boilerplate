<?php
/*
Plugin Name: WPPB Dev Reloader (MU)
Description: Development-only helper. When DEV_HOT_RELOAD=1, resets OPcache on each request to ensure code changes are picked up immediately.
Version: 1.0.0
Author: WP Plugin Boilerplate
*/

// Only run in development when explicitly enabled via environment variable
if (getenv('DEV_HOT_RELOAD') !== '1') {
    return;
}

add_action('init', static function () {
    if (function_exists('opcache_reset')) {
        @opcache_reset();
    }
});
