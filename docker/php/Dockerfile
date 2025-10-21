FROM php:8.2-fpm

# basic extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# install composer deps (composer.json present in project)
COPY composer.json composer.lock* /var/www/html/
RUN composer install --no-interaction --no-dev --optimize-autoloader || true

# copy rest
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
