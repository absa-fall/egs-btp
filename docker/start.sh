#!/bin/bash

# Créer le fichier .env depuis les variables d'environnement
cat > /var/www/html/.env << EOF
APP_NAME="EGS BTP"
APP_ENV=production
APP_DEBUG=false
APP_KEY=${APP_KEY}
APP_URL=${APP_URL}

DB_CONNECTION=${DB_CONNECTION}
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}

SESSION_DRIVER=cookie
CACHE_DRIVER=file
LOG_CHANNEL=stderr
VIEW_COMPILED_PATH=/tmp/views
EOF

# Créer dossier views avec bonnes permissions
mkdir -p /tmp/views
chmod -R 777 /tmp/views

# Créer dossiers storage
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/framework/sessions
chmod -R 777 /var/www/html/storage

# Migrations
php artisan migrate --force

# Vider les caches
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Démarrer Apache
apache2-foreground