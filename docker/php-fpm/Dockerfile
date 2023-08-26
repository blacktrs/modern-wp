FROM php:8.1-fpm-bookworm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR "/app"

RUN usermod -u 1000 www-data

RUN apt-get update; \
    apt-get upgrade; \
    apt-get -y install apt-transport-https lsb-release  \
        ca-certificates wget zip unzip libzip-dev libxml2-dev  \
        libcurl4-openssl-dev libgd-dev libonig-dev g++;

RUN docker-php-ext-install mysqli opcache;

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN chown -R www-data:www-data .


ENV COMPOSER_HOME /var/www/html