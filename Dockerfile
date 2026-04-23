FROM php:8.2-cli

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto
WORKDIR /app
COPY . .

# Instalar dependencias Laravel
RUN composer install

# Exponer puerto
EXPOSE 10000

# Arrancar servidor
CMD php -S 0.0.0.0:10000 -t public