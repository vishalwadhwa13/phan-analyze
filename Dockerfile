FROM php:7.4-alpine

WORKDIR /root

RUN apk add --no-cache --update --virtual .phan-deps autoconf g++ libtool make $PHPIZE_DEPS && \
    pecl install ast && \
    docker-php-ext-enable ast && \
    curl -L https://github.com/phan/phan/releases/download/2.4.9/phan.phar -o phan.phar && \
    apk del .phan-deps

WORKDIR /src 
# CMD ["php", "-v"]
# CMD ["php", "-i"]
# CMD ["php --ini"]
# ENV TERM xterm-256color

ENTRYPOINT ["php", "/root/phan.phar"]


