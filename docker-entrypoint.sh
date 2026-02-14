#!/bin/bash
set -e

# Criar .env a partir das variáveis de ambiente do Render
cat > /var/www/html/.env << EOF
APP_NAME="${APP_NAME:-WALTECH}"
APP_ENV="${APP_ENV:-production}"
APP_KEY=${APP_KEY}
APP_DEBUG="${APP_DEBUG:-false}"
APP_URL="${APP_URL:-http://localhost}"
APP_TIMEZONE=America/Sao_Paulo

LOG_CHANNEL="${LOG_CHANNEL:-stderr}"
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=sqlite

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync

SESSION_DRIVER="${SESSION_DRIVER:-file}"
SESSION_LIFETIME=120

CACHE_STORE=file
CACHE_PREFIX=

VITE_APP_NAME="\${APP_NAME}"
EOF

# Garantir permissões corretas
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpar e recriar cache do Laravel
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Recriar cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Iniciar Apache
exec apache2-foreground
