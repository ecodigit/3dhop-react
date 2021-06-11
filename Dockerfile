FROM php:apache

COPY src/ /var/www/html

RUN pecl install mongodb \
	&& pear config-set php_ini /usr/local/etc/php/php.ini \
	&& echo "extension=mongodb.so" > /usr/local/etc/php/php.ini

# Install Composer
RUN apt-get update && apt-get -y --no-install-recommends install git \
	&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
	&& composer require mongodb/mongodb 
#	&& composer require easyrdf/easyrdf
