FROM php:8.0-fpm
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd
RUN apt-get -y install libzip-dev
RUN docker-php-ext-install zip

RUN docker-php-ext-install mysqli pdo_mysql
COPY --from=composer /usr/bin/composer /usr/bin/composer
