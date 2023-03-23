FROM php:8.2-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && pecl install apcu

RUN docker-php-ext-enable apcu 
RUN docker-php-ext-install zip intl opcache pdo pdo_mysql
RUN docker-php-ext-configure zip 

WORKDIR /var/www/symfony_docker

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
RUN git config --global user.email ${GITHUB_EMAIL:-"weslleyrichardc@gmail.com"} \ 
    && git config --global user.name ${GITHUB_NAME:-"Weslley Richard"}
