FROM php:7.4-fpm

RUN usermod -u 1000 www-data

ARG SSH_KEY
ARG SSH_KEY_PASSPHRASE

RUN apt-get update \
&& docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
RUN pecl install redis-5.1.1 \
    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable redis xdebug
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
##########################################################################
# Install git
##########################################################################

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

###########################################################################
# Add ssh to container:
###########################################################################
RUN  apt-get -yq update && \
     apt-get -yqq install ssh

RUN mkdir -p /root/.ssh && \
    chmod 0700 /root/.ssh && \
    ssh-keyscan bitbucket.org > /root/.ssh/known_hosts && \
    echo "${SSH_KEY}" > /root/.ssh/id_rsa && \
    chmod 600 /root/.ssh/id_rsa

RUN eval `ssh-agent -s` && \
    printf "${SSH_KEY_PASSPHRASE}\n" | ssh-add $HOME/.ssh/id_rsa

###########################################################################
# xDebug:
###########################################################################

ARG INSTALL_XDEBUG=true

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
  # Install the xdebug extension
  if [ $(php -r "echo PHP_MAJOR_VERSION;") = "5" ]; then \
    pecl install xdebug-2.5.5; \
  else \
    pecl install xdebug; \
  fi && \
  docker-php-ext-enable xdebug \
;fi
# Copy xdebug configuration for remote debugging
COPY /docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN sed -i "s/xdebug.remote_autostart=0/xdebug.remote_autostart=1/" /usr/local/etc/php/conf.d/xdebug.ini && \
    sed -i "s/xdebug.remote_enable=0/xdebug.remote_enable=1/" /usr/local/etc/php/conf.d/xdebug.ini && \
    sed -i "s/xdebug.cli_color=0/xdebug.cli_color=1/" /usr/local/etc/php/conf.d/xdebug.ini

COPY /docker/php-fpm/xdebug.ini /etc/php/7.4/mods-available/xdebug.ini

