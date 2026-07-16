#!/bin/bash
set -e

# If arguments are passed, execute them and exit (e.g., for composer install)
if [ "$#" -gt 0 ]; then
    exec "$@"
fi

echo "UNESCO Zimbabwe - Starting application..."

# Wait for MySQL to be ready
echo "Waiting for MySQL..."
until php artisan tinker --execute="DB::connection()->getPdo();" 2>/dev/null; do
    sleep 2
done
echo "MySQL is ready!"

# Copy .env.example if .env does not exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Generate app key if not set
if ! grep -q "APP_KEY=base64:" .env 2>/dev/null; then
    echo "Generating application key..."
    php artisan key:generate
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Link storage
php artisan storage:link --force 2>/dev/null || true

# Clear and cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Application ready! Starting server on port 8000..."

exec php artisan serve --host=0.0.0.0 --port=8000
