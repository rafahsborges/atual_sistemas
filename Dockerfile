FROM php:7.2-apache
RUN apt-get update

# INSTALL POSTGRES EXTENSION
# Instal teste para laravel. Dockerfile para testar laravel.
RUN apt-get install -y libpq-dev \
 && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
 && docker-php-ext-install pdo pdo_pgsql pgsql

RUN apt-get install -y --no-install-recommends \
    git \
    zlib1g-dev \
    libxml2-dev \
 && docker-php-ext-install \
    zip \
    soap \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

WORKDIR /var/www/atualsistemas

COPY ./000-default.conf /etc/apache2/sites-available

COPY . .

RUN chown -R www-data:www-data /var/www/atualsistemas \
    && chmod -R 775 /var/www/atualsistemas

COPY ./docker-config/php.ini /usr/local/etc/php/conf.d/php-extras.ini

RUN composer install

# Enable Apache Rewrite Module
RUN a2enmod rewrite
RUN a2enmod headers

EXPOSE 80
