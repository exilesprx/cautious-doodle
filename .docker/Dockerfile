FROM webdevops/php-dev:8.2 AS dev

WORKDIR /opt/project

COPY .docker/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


FROM dev AS build

COPY . /opt/project

RUN composer install

RUN composer dump-autoload