FROM wordpress:6.7.1-php8.3-apache

# No extra steps required; the compose file mounts the plugin into wp-content/plugins

EXPOSE 80
