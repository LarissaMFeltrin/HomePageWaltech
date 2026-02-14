# Multi-stage build para otimizar
FROM composer:latest AS composer-deps

WORKDIR /app

# Copiar composer files
COPY composer.json composer.lock ./

# Instalar dependências
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# Stage final
FROM php:8.2-apache

# Instalar dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configurar PHP
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory-limit.ini

# Configurar Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && a2enmod rewrite headers

WORKDIR /var/www/html

# Copiar vendor do stage anterior
COPY --from=composer-deps /app/vendor ./vendor

# Copiar código fonte
COPY . .

# Criar diretórios necessários
RUN mkdir -p storage/framework/{sessions,views,cache} \
    storage/logs \
    bootstrap/cache

# Configurar permissões
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Build assets
RUN npm ci && npm run build && npm cache clean --force && rm -rf node_modules

# Expor porta
EXPOSE 80

CMD ["apache2-foreground"]
