FROM php:8.1.1-apache
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN apt-get update && \
    apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install intl pdo_mysql zip bcmath && \
    cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/ && \
    cp /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/ && \
    mkdir /var/lib/php/ && \
    mkdir /var/lib/php/session && \
    chown -R www-data:www-data /var/lib/php/session
