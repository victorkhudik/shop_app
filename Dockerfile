FROM php:8.2-apache

# Установка системных зависимостей и PHP-расширений для Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Включение модуля mod_rewrite для Apache
RUN a2enmod rewrite

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копирование конфига Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html