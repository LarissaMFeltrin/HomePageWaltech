# Use PHP 8.2 com Apache
FROM php:8.2-apache

# Instalar dependências do sistema
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
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias para Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Configurar limite de memória do PHP
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory-limit.ini

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite headers

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar composer files primeiro (para cache)
COPY composer.json composer.lock ./

# Instalar dependências do Composer
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copiar o resto dos arquivos
COPY . .

# Finalizar instalação do Composer
RUN composer dump-autoload --optimize --no-dev

# Criar diretórios necessários
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar dependências do Node e build
RUN npm ci --only=production
RUN npm run build

# Limpar cache do npm
RUN npm cache clean --force && rm -rf node_modules

# Expor porta
EXPOSE 80

# Comando de inicialização
CMD ["apache2-foreground"]
