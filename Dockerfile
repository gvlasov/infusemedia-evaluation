FROM php:8-cli-alpine3.16
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql