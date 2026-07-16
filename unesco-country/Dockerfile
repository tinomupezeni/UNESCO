FROM php:8.4-cli

# System dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip curl libicu-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libzip-dev libonig-dev libxml2-dev libcurl4-openssl-dev pkg-config \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql mbstring exif intl bcmath gd zip opcache pcntl \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY docker/app.sh /usr/local/bin/app.sh
RUN chmod +x /usr/local/bin/app.sh

EXPOSE 8000

ENTRYPOINT ["app.sh"]
