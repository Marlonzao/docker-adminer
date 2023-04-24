FROM php:7.3-apache
COPY local.ini /usr/local/etc/php/conf.d/local.ini
COPY src/ /var/www/html
EXPOSE 80

RUN apt-get update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql
