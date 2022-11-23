FROM webdevops/php-dev:8.0

COPY . /opt/project

WORKDIR /opt/project

RUN composer install && composer dump-autoload