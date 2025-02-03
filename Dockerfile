FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
ADD ./docker-compose/custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

## Install npm
RUN apt-get update && apt-get install -y \
    npm
#RUN npm install npm@latest -g && \
#    npm install n -g && \
#    n latest

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
