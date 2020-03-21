FROM php:7.4-alpine

ARG RELEASE

WORKDIR /root

# phan
RUN curl -L https://github.com/phan/phan/releases/download/${RELEASE}/phan.phar -o phan.phar

# php ast
RUN apk add --no-cache --update --virtual .phan-deps autoconf g++ libtool make $PHPIZE_DEPS && \
    pecl install ast && \
    docker-php-ext-enable ast && \
    apk del .phan-deps

WORKDIR /src

ENTRYPOINT ["php", "/root/phan.phar"]
