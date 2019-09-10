# dir: /docker/php
FROM php:7.3-fpm

RUN apt-get update && apt-get install -y vim \
                      zlibc\
                      git\
                      libzip-dev \
                      zlib1g-dev \
                      curl
# install zip
RUN docker-php-ext-install mysqli && docker-php-ext-install pdo_mysql && docker-php-ext-install bcmath && docker-php-ext-install zip

#install postgres pdo
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql
    
    
# install xdebug
#RUN pecl install xdebug-2.7.2 && \
#    docker-php-ext-enable xdebug

#install composer
WORKDIR /
RUN curl -s https://getcomposer.org/installer | php  && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer
    
#install laravel
#RUN composer global require laravel/installer
WORKDIR /home/www/mysite
