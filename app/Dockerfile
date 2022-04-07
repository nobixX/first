FROM php:7.4-fpm

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

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pgsql pdo_pgsql


# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www
COPY ./code/. .

ARG COMPOSER_ENV 

RUN if [ "$COMPOSER_ENV" = "development" ]; \
    then composer install; \
    else composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader; composer install --optimize-autoloader; \
    fi 

# stackoverflow crap

RUN chmod 777 -R storage bootstrap/cache

RUN chmod -R ugo+rw storage

# CMD [ "chmod -R ugo+rw storage" ]

