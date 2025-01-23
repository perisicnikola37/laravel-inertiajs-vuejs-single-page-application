FROM php:8.2-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

COPY . .

COPY .env.example .env

RUN npm install
RUN npm run build

RUN composer dump-autoload

RUN php artisan storage:link

RUN php artisan key:generate

# Expose ports for PHP server and frontend
EXPOSE 9000 3000

# Set up command to run both PHP server and frontend
CMD php artisan serve --host=0.0.0.0 --port=9000 & npm run dev -- --host
