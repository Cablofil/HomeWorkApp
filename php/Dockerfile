FROM php:8.3-apache

RUN apt-get update && \
    apt-get install -y zlib1g-dev libfreetype6-dev libpng-dev libjpeg-dev libwebp-dev libzip-dev unzip git && \
    apt-get clean && \
# Install extensions
    docker-php-ext-install pdo_mysql zip exif pcntl sockets && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install gd && \
    a2enmod rewrite

RUN pecl install xdebug-3.3.2 \
    && docker-php-ext-enable xdebug


COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"