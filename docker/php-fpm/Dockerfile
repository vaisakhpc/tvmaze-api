FROM php:8.1.4RC1-fpm
WORKDIR "/app"

RUN apt-get update
RUN apt-get install -y libzip-dev zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN apt-get clean
