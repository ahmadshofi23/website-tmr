FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Give write permission
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Copy start script
COPY start-container.sh /start-container.sh
RUN chmod +x /start-container.sh

# Expose port
EXPOSE 9000

# Jalankan script
CMD ["/start-container.sh"]
