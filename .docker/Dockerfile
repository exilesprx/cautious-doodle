FROM webdevops/php-dev:8.1

COPY . /opt/project

COPY .docker/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /opt/project

RUN composer install

RUN composer dump-autoload