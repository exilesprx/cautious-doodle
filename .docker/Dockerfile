FROM php:8.3 AS dev

COPY --from=mlocati/php-extension-installer:2.1.30 /usr/bin/install-php-extensions /usr/local/bin/

COPY .docker/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN install-php-extensions @composer-2

WORKDIR /opt/project


FROM dev AS build

COPY . /opt/project

RUN composer install