FROM php:8.2-apache

WORKDIR /app
RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install --fix-missing -y libpq-dev
RUN apt-get install --no-install-recommends -y libpq-dev
RUN apt-get install -y libxml2-dev libbz2-dev zlib1g-dev
RUN apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client curl exif ftp
RUN docker-php-ext-install intl
RUN apt-get -y install --fix-missing zip unzip

COPY . /app

# Install Composer (PHP package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

ADD conf/000-default.conf /etc/apache2/sites-available/000-default.conf
ADD conf/security.conf /etc/apache2/conf-available/security.conf
ADD conf/ssl.conf /etc/apache2/mods-available/ssl.conf

RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl

RUN chmod -R 777 /app/storage

RUN apt-get clean \
    && rm -r /var/lib/apt/lists/*

EXPOSE 80

CMD ["apache2-foreground"]
