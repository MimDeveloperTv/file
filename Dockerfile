FROM php:8.1.13-fpm-bullseye

#RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev cron zip unzip
RUN apt-get update && apt-get install -y git curl cron libzip-dev libonig-dev unzip rsync
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN pecl install redis
RUN docker-php-ext-enable redis
RUN docker-php-ext-install zip pdo_mysql mbstring

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN sed -i -e "s/upload_max_filesize = .*/upload_max_filesize = 100M/g" \
           -e "s/post_max_size = .*/post_max_size = 100M/g" \
           -e "s/memory_limit = .*/memory_limit = -1/g" \
        /usr/local/etc/php/php.ini

COPY . /var/www/html

WORKDIR /var/www/html

COPY --from=composer:2.7.6 /usr/bin/composer /usr/bin/composer
