# Use an official PHP image with Apache
FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli

# Copy all files into the Apache web directory
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/
