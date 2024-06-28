# Usa a imagem base do PHP 8.0 com Apache
FROM php:8.0-apache

# Atualiza o índice de pacotes e instala as dependências necessárias
RUN apt-get update && \
    apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        libxml2-dev \
        zlib1g-dev \
        libicu-dev \
        libpq-dev \
        libonig-dev \
        unzip \
        git \
        curl \
        nano \
        gnupg

# Instala extensões do PHP necessárias
RUN docker-php-ext-install -j$(nproc) \
    gd \
    pdo \
    pdo_mysql \
    mysqli \
    mbstring \
    zip \
    intl \
    opcache

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define o diretório de trabalho como /var/www/html
WORKDIR /var/www/html

# Define o usuário e grupo do Apache para evitar problemas de permissão
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80 para o Apache
EXPOSE 80

# Comando padrão para iniciar o Apache ao iniciar o contêiner
CMD ["apache2-foreground"]
