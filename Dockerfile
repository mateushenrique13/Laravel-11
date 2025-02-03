FROM php:8.3-fpm

# set username
ARG user=Mateus
ARG uid=1000

# Install system dependencies and tools for PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    autoconf \
    gcc \
    make \
    libc-dev \
    pkg-config \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (AGORA COM INTL)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets intl

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user
RUN groupadd -g 33 www-data || true \
    && useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

# Copy custom PHP configuration
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user

# FINAL CMD PARA RODAR O PHP-FPM
CMD ["php-fpm"]
