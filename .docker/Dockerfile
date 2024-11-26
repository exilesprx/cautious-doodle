FROM mlocati/php-extension-installer:2.7.1 AS installer
FROM php:8.3 AS base


FROM base AS dev
COPY --from=installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions @composer-2 xdebug \
  && useradd -m -u 1000 -s /bin/bash doodle
WORKDIR /var/www
USER doodle
ENTRYPOINT [ "/bin/bash"]
