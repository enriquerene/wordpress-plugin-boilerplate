### WP Plugin Boilerplate — Quick Guide

Short checklist to rename this boilerplate and run it locally with Docker.

#### Current identifiers
- Name: `WP Plugin Boilerplate`
- Slug: `wp-plugin-boilerplate`
- Namespace: `WPPB`
- Text domain: `plugin-name`
- Main file: `plugin-name.php`

#### Rename in these places
1) `src/Core/Constants.php`
   - `PLUGIN_NAME`, `PLUGIN_BASE_NAME`
2) `plugin-name.php`
   - Header fields (Plugin Name, Text Domain) and keep `WPPB_PLUGIN_BASENAME`
3) Optional
   - Namespace `WPPB` (update `composer.json` → `autoload.psr-4` and run `composer dump-autoload`)
   - Rename `plugin-name.php` to your slug file

Suggested searches: `WP Plugin Boilerplate`, `wp-plugin-boilerplate`, `WPPB`, `plugin-name`.

---

### Local Development (Docker)

This repo ships with `docker-compose` for a quick WordPress + MySQL stack.

What you get
- WordPress: `wordpress:6.7.1-php8.3-apache` on http://localhost:8080
- MySQL: `mysql:8.0` with DB `wordpress` / user `wordpress` / pass `wordpress`
- Your plugin is mounted into `/var/www/html/wp-content/plugins/wp-plugin-boilerplate`
- Composer auto-run: a one-shot `composer:2` service runs `composer install` for the plugin on `docker compose up`.

Run
```
docker compose up -d
```

Visit http://localhost:8080 to finish the WordPress installer. Then activate “WP Plugin Boilerplate” in Plugins.

Stop & remove
```
docker compose down
```

Wipe DB volume too
```
docker compose down -v
```

Notes
- UID/GID: The Composer service runs as `${UID}:${GID}` (defaults to 1000:1000). On Linux, export your IDs before first run for correct file ownership:
  - `export UID=$(id -u) && export GID=$(id -g)`
  - Or create a `.env` file with `UID=…` and `GID=…`.
- Re-run Composer manually: `docker compose run --rm composer`
- Debug: WP_DEBUG is enabled by default in Docker via `WORDPRESS_DEBUG=1`. Set to `0` in `docker-compose.yml` to disable.

---

### Hot Reload (PHP)

- Enabled by default in dev: `DEV_HOT_RELOAD=1` (set in docker-compose.yml).
- What it does:
  - Mounts a PHP ini override enabling instant OPCache revalidation.
  - Loads an MU-plugin that calls `opcache_reset()` on each request in dev.
- To disable: set `DEV_HOT_RELOAD=0` (or remove) and `docker compose up -d`.
