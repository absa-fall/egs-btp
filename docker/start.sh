#!/bin/bash
mkdir -p /tmp/views
php artisan key:generate --force
php artisan migrate --force
php artisan config:clear
php artisan view:clear
php artisan route:clear
apache2-foreground