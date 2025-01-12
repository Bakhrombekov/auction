FROM php:8.2-fpm

WORKDIR /var/www/otabek

RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    vim \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    libxslt-dev \
    libpq-dev && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd pdo pdo_pgsql mbstring zip exif pcntl bcmath opcache intl xsl

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . /var/www/otabek

RUN composer install --no-scripts --no-dev && \
    chown -R www-data:www-data /var/www

EXPOSE 9000

CMD ["php-fpm"]
