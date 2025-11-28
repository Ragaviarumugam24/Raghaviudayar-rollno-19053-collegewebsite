FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project to Apache directory
COPY . /var/www/html/

# Give permissions
RUN chown -R www-data:www-data /var/www/html
