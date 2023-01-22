FROM php:8.2-apache

LABEL org.opencontainers.image.source="https://github.com/adrien-chinour/helpers"

WORKDIR /var/www

RUN curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o - | sh -s \
      gd \
      zip \
      opcache

COPY infra/apache2/default.conf /etc/apache2/sites-available/000-default.conf

COPY web/ web
COPY src/ src
COPY templates/ templates

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --prefer-dist --no-dev --optimize-autoloader
