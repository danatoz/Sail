FROM php:apache
WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 80
RUN docker-php-ext-install pdo pdo_mysql