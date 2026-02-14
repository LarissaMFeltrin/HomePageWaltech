#!/usr/bin/env bash
# exit on error
set -o errexit

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Build assets com Vite
npm install
npm run build

# Clear and cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build completed successfully!"
