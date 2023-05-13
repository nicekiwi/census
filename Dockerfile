FROM php:8.2

# Copy composer from docker
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
