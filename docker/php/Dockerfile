FROM php:8.2-fpm-alpine

# install library
RUN apk update && \
    apk add --no-cache --virtual .php-builds oniguruma-dev git zip unzip bash

# add php-ext-module
RUN docker-php-ext-install mbstring && \
    docker-php-ext-enable mbstring && \
    docker-php-ext-install pdo_mysql

# install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/