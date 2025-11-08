# Imagen base de PHP + Apache
FROM php:8.2-apache

# Copia tu proyecto al servidor web
COPY . /var/www/html/

# Configura permisos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto
EXPOSE 80
