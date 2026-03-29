# PHP 8.2 avec Apache
FROM php:8.2-apache

# Extensions nécessaires pour Laravel + PostgreSQL (Render utilise PostgreSQL)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libpq-dev \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
    && a2enmod rewrite

# Supprimer l'avertissement ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Installer Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Répertoire de travail
WORKDIR /var/www/html

# Copier le projet
COPY . .

# Copier la config Apache
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions storage et cache
RUN chown -R www-data:www-data storage bootstrap/cache public \
    && chmod -R 775 storage bootstrap/cache

# Port Render
ENV PORT=10000
EXPOSE 10000

# Configurer Apache sur le bon port et bon DocumentRoot
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf \
    && sed -i "s|*:80|*:${PORT}|g" /etc/apache2/sites-available/000-default.conf \
    && a2ensite 000-default.conf \
    && a2enmod rewrite

# Script de démarrage
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh
RUN mkdir -p /tmp/views && chmod 777 /tmp/views
CMD ["/start.sh"]