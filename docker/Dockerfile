FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update

RUN apt-get install -y software-properties-common
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php

RUN apt-get update

RUN apt-get install -y curl git nginx php7.4-cli php7.4-common php7.4-iconv php7.4-xmlrpc php7.4-curl php7.4-gd php7.4-imap php7.4-soap \
    php7.4-fpm php7.4-pgsql php7.4-mysql php7.4-dev php-pear php7.4-intl php7.4-mysql php7.4-mbstring php7.4-zip php7.4-xml php7.4-sybase

COPY ./docker/infrastructure /etc/nginx/sites-available

EXPOSE 8083 5432
CMD service php7.4-fpm start && nginx -g "daemon off;"

