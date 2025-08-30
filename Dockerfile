FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev libicu-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql intl zip \
    && a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html