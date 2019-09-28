FROM php:7.2

WORKDIR prontuario

# Copiando os diretórios para dentro do container
COPY app app
COPY bootstrap bootstrap
COPY config config
COPY database database
COPY public public
COPY resources resources
COPY routes routes
COPY storage storage

# Copiando as dependências
COPY composer.lock composer.lock
COPY composer.json composer.json
COPY server.php server.php
COPY artisan artisan


RUN apt-get update && apt-get install git -y && \
    git config --global http.sslverify false && \ 
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer  && \
    chmod +x /usr/local/bin/composer && \
    docker-php-ext-install pdo pdo_mysql && \
    composer install
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0