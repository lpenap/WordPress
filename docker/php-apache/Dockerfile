FROM php:7.2-apache

# Update package definitions and upgradeable packages
RUN apt-get update -y; \
    apt-get upgrade -y;

# Install mysqli (PDO)
RUN docker-php-ext-install mysqli

# Updte and install extra libs required for Wordpress
RUN apt-get update -y && \
    apt-get install -y sendmail libpng-dev

RUN apt-get update && \
    apt-get install -y zlib1g-dev

RUN apt-get update && apt-get install -y \
	libmagickwand-dev --no-install-recommends \
	&& pecl install imagick \
	&& docker-php-ext-enable imagick

RUN docker-php-ext-install mbstring

RUN docker-php-ext-install zip

RUN docker-php-ext-install gd
