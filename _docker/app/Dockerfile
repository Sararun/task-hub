FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    apt-utils \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install opcache


# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install Xdebug extension
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Customize PHP configuration for development
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/ /var/tmp/*

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

# Set working directory
WORKDIR /var/www
