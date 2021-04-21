FROM php:7.2-apache
RUN set -ex; apt-get update; apt-get install -y curl
RUN rm -rf var/lib/apt/lists/*
RUN docker-php-ext-install mysqli pdo_mysql
RUN apt-get install mariadb-client
RUN mariadb -h zmysql -u root -ppassword < alunni-classi.sql
