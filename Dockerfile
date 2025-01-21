FROM php:8.1-apache

# Installation de mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite

# Copie du projet dans le conteneur
COPY . /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

COPY ./config/apache.conf /etc/apache2/sites-available/000-default.conf

# Port 80
EXPOSE 80
