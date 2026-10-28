FROM php:8.1-fpm-alpine

# Instala dependências de sistema e extensões necessárias para o CodeIgniter 3 e MySQL
RUN apk add --no-cache \
    bash \
    curl \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        mysqli \
        pdo_mysql \
        mbstring \
        intl \
        zip \
        opcache \
        gd

WORKDIR /var/www/html

# Copia configurações otimizadas do PHP
COPY docker/php/local.ini /usr/local/etc/php/conf.d/local.ini

# Copia código-fonte da aplicação
COPY . /var/www/html

# Ajusta permissões dos diretórios de cache e logs do CodeIgniter
RUN mkdir -p /var/www/html/application/cache /var/www/html/application/logs \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/application/cache /var/www/html/application/logs \
    && sed -i 's/\r$//' /var/www/html/docker/scripts/start-app.sh \
    && chmod +x /var/www/html/docker/scripts/start-app.sh

EXPOSE 9000

CMD ["/var/www/html/docker/scripts/start-app.sh"]
