FROM webdevops/php-dev:8.0

COPY . /opt/project

COPY .docker/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /opt/project

ENV XDEBUG_SESSION=phpstorm

RUN composer install && composer dump-autoload