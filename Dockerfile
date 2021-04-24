FROM php:8.0.3-fpm-alpine

ENV TZ=Europe/Minsk

RUN apk add --update --no-cache \
    tzdata \
    zip \
    autoconf \
    g++ \
    make \
    icu-libs \
    alpine-sdk \
    git \
    curl \
    ca-certificates \
    bash \
    supervisor \
    openssl \
    openssl-dev \
 && docker-php-ext-install opcache \
 && docker-php-ext-install pdo_mysql \
 && docker-php-ext-install sockets \
 && echo "date.timezone=$TZ" > "$PHP_INI_DIR/conf.d/date-time-zone.ini" \
 && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --from=composer:2.0.12 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug-3.0.2 \
    && docker-php-ext-enable xdebug


WORKDIR /var/www/html
ADD . .

RUN mkdir -p /var/log/supervisor
RUN mkdir -p /var/run/supervisor
COPY ./supervisor /etc/supervisor

RUN  cp www.conf /usr/local/etc/php-fpm.d/www.conf
#cp .env.template .env && \


RUN composer install -n

RUN chmod -R 777 var && \
    chown -R www-data:www-data . \
    && chown -R www-data:www-data /var/log/supervisor \
    && chown -R www-data:www-data /var/run/supervisor

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
