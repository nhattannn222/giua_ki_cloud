# Sử dụng hình ảnh PHP 7.4 với Apache
FROM php:7.4-apache

# Cài đặt các công cụ cần thiết và phần mở rộng MySQLi
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Bật module rewrite của Apache
RUN a2enmod rewrite

# Sao chép tệp cấu hình Apache
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Sao chép ứng dụng vào thư mục /var/www/html
COPY . /var/www/html

# Expose port 80
EXPOSE 80