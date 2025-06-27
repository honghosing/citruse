#!/bin/sh
set -e  # Exit immediately if any command fails

cd /var/www

# Configure Git safe directory to avoid permission issues.
echo "🔧 Configuring Git safe directory..."
git config --global --add safe.directory /var/www

# Install the global Composer packages so that their executables are available.
echo "🔧 Installing global Composer packages..."
composer global require laravel/installer --with-all-dependencies --no-interaction

# Ensure Composer's global bin directory is in the PATH.
export PATH="$(composer global config bin-dir --absolute):$PATH"

cd /var/www

# If the Laravel project directory does not exist, let Laravel create it.
if [ -d "html" ]; then
    echo "🔧 Laravel folder exists force installing. Creating new Laravel project..."
    laravel new --vue --phpunit html
else
    echo "🔧 Laravel folder exists project not found. Creating new Laravel project..."
    laravel new --vue --phpunit html


fi

# Change into the Laravel project directory.
cd html

# Install spatie permissions
composer require spatie/laravel-permission


# Copy .env file only if it doesn't exist
if [ ! -f ".env" ]; then
    echo "🔧 Copying default .env file..."
    cp /var/www/docker/setup/.env .env
else
    cp .env .env~
    cp /var/www/docker/setup/.env .env
    echo "🔧 .env file already exists, making backup. Copying default .env file..."
fi

# (Optional) If the vendor directory is missing, install the PHP dependencies.
# Normally, laravel new already runs composer install.
if [ ! -d "vendor" ]; then
    echo "🔧 Installing project dependencies..."
    composer install --no-interaction --optimize-autoloader
fi

# Now run the artisan installer commands for each package if the package is available.
if [ -f "artisan" ]; then
    #update vite
    npm run build

    # Run additional artisan commands for application setup.
    echo "Running Laravel setup commands..."
    php artisan key:generate
    php artisan migrate:fresh --seed --force

    php artisan cache:clear
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    composer dump-autoload
else
    echo "Artisan not found! Skipping Laravel setup commands."
fi

# Fix permissions for storage and bootstrap/cache.
echo "Finalizing permissions..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "Startup process completed successfully."
exec "$@"
