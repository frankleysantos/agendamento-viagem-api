FROM php:8.0-apache

USER root

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update -y && dpkg --configure -a && apt-get install -y --fix-broken git \
    curl \
    build-essential \
    libfreetype6-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zlib1g-dev \
    libicu-dev \
    libmcrypt-dev \
    openssl \
    g++ \
    libcurl4-openssl-dev \
    libpq-dev \
    libzip-dev \
    libwebp-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    unzip \
    libssh-dev 

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN apt-get update -y

RUN apt-get install -y ssh libssh2-1

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions ssh2

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

WORKDIR /var/www/html

COPY deploy/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY deploy/config/php.ini /usr/local/etc/php/php.ini
COPY deploy/config/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

COPY . .

RUN a2enmod rewrite headers \
    && service apache2 restart

RUN chmod 777 -R ./storage/ ./bootstrap/

RUN php artisan config:cache && php artisan config:clear && ln -sfT /dev/stderr "storage/logs/laravel.log"

RUN chmod o+w ./storage/ -R

RUN chmod 777 -R ./vendor/

RUN rm -rf deploy

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
