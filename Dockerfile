FROM php:8.2-apache

# Copiar todos los archivos del proyecto al servidor web de Apache
COPY . /var/www/html/

# Exponer el puerto donde corre Apache
EXPOSE 80
