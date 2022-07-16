FROM phpdockerio/php:8.1-fpm
WORKDIR "/app"

RUN usermod -u 1000 www-data

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.1-intl \
        php8.1-mysql \
        php8.1-xdebug; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
