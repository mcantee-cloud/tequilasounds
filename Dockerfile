# Imagen base oficial de PHP con Apache
FROM php:8.2-apache

# Copiar todos los archivos del proyecto al servidor Apache
COPY . /var/www/html/

# Habilitar extensiones PHP necesarias (opcional)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Dar permisos a la carpeta del sitio
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 para HTTP
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
