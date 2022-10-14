FROM php:7.3-apache
COPY local.ini /usr/local/etc/php/conf.d/local.ini
COPY src/ /var/www/html
EXPOSE 80
