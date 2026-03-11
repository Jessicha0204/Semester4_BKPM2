# Gunakan PHP 8.2 FPM
FROM php:8.2-fpm

# Install dependency sistem yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Install ekstensi PHP
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Set working directory
WORKDIR /var/www/html

# Copy semua project Laravel (bukan src!)
COPY . .

# Ambil Composer dari image resmi (lebih aman dari curl)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Set permission Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 9000

CMD ["php-fpm"]
