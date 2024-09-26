# Usa l'immagine ufficiale di PHP con estensioni necessarie per Laravel
FROM php:8.1-fpm

# Installa estensioni PHP richieste
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    nginx \
    && docker-php-ext-install pdo pdo_mysql

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta la cartella di lavoro
WORKDIR /var/www

# Copia i file del progetto
COPY . .

# Installa le dipendenze di Laravel
RUN composer install --no-dev --optimize-autoloader

# Copia il file di configurazione di Nginx
COPY .docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Imposta i permessi corretti
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Esponi la porta 80 per Nginx
EXPOSE 80

# Comando di avvio: avvia sia Nginx che PHP-FPM
CMD service nginx start && php-fpm
