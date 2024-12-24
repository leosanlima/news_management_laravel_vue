#!/bin/sh
set -e

# Wait for database to be ready
echo "Waiting for database connection..."
while ! nc -z db 3306; do
  sleep 1
done

cp .env.example .env

# Install dependencies
composer install --no-interaction --no-progress --optimize-autoloader

php artisan key:generate --no-interaction

php artisan migrate:fresh --seed --force

php artisan install:api --silent

# Start PHP-FPM
#php-fpm

exec php artisan serve --host=0.0.0.0 --port=8000