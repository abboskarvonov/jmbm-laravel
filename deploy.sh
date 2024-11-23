#!/bin/sh
set -e

echo "🚚 Deploying application"

git pull origin main

echo "📦 Installing composer dependencies"
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

echo "🗃️ Running migrations"
php artisan migrate --force


echo "🧹 Clear cache"
php artisan optimize:clear

echo "🎉 Deployed application"