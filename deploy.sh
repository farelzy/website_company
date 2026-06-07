#!/bin/bash
set -e

echo "Deploying application ..."

# Enter maintenance mode
php artisan down || true

# Update codebase
git pull origin main

# Install dependencies based on lock file
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Compile NPM assets
npm ci
npm run build

# Clear caches
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Filament cache
php artisan filament:cache-components

# Migrate database
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Application deployed successfully!"
