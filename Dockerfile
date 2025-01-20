# Utiliser une image officielle PHP avec Apache
FROM php:8.1-apache

# Installer les extensions nécessaires pour PHP et MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer le module rewrite d'Apache
RUN a2enmod rewrite

# Copier tout le projet dans le conteneur
COPY . /var/www/html

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html

# Configurer Apache
COPY ./config/apache.conf /etc/apache2/sites-available/000-default.conf

# Exposer le port 80 pour Apache
EXPOSE 80
