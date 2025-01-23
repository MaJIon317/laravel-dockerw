FROM php:8.3-fpm

ARG DIR=/var/www

COPY php.ini /usr/local/etc/php/
COPY docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY .bashrc /root/

# Установка системных зависимостей и php расширений
# mix
RUN apt-get update \
  && apt-get install -y nodejs build-essential zlib1g-dev default-mysql-client curl gnupg procps vim git unzip libzip-dev libpq-dev \
  && docker-php-ext-install zip pdo_mysql pdo_pgsql pgsql

# intl and FTP
RUN apt-get install -y libicu-dev libssl-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-configure ftp \
  && docker-php-ext-install intl \
  && docker-php-ext-install ftp

# gd
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev  && \
  docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-webp=/usr/include/ && \
  docker-php-ext-install gd

RUN apt-get install -y supervisor

# redis
RUN pecl install redis && docker-php-ext-enable redis

# pcntl
RUN docker-php-ext-install pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Node.js, NPM, Yarn
RUN curl -sL https://deb.nodesource.com/setup_22.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g
RUN npm install yarn -g

# Copy local supervisord.conf to the conf.d directory
COPY --chown=root:root supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chown -R www-data:www-data $DIR

# Меняем пользователя на www-data
USER www-data

WORKDIR $DIR

# docker compose up -d --build