#!/bin/sh
set -e

echo "[start-app] Configurando permissoes de cache e logs do CodeIgniter..."
mkdir -p /var/www/html/application/cache /var/www/html/application/logs
chown -R www-data:www-data /var/www/html/application/cache /var/www/html/application/logs
chmod -R 777 /var/www/html/application/cache /var/www/html/application/logs

echo "[start-app] Inicializando PHP-FPM..."
exec php-fpm
