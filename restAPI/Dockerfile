FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev

RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath zip

# Install MongoDB extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalação do Node.js e npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs npm

# Instalação do Vue.js
RUN npm install -g vue@next

WORKDIR /var/www/html

COPY . .

RUN composer require jenssegers/mongodb

RUN composer install --no-interaction

RUN chown -R www-data:www-data /var/www/html/storage

RUN a2enmod rewrite

# Create a new Apache configuration file
RUN echo "ServerName localhost" >> /etc/apache2/conf-available/docker-php.conf
RUN a2enconf docker-php

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000

