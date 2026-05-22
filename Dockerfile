
FROM php:8.2-apache

# Install MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable mod_rewrite for URL rewriting
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy .htaccess for URL rewriting
COPY .htaccess /var/www/html/.htaccess

# Change ownership to www-data
RUN chown -R www-data:www-data /var/www/html
