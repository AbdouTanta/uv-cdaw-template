FROM php:8.0-apache

# update os
RUN apt-get update && apt-get upgrade -y \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# additional OS packages
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get -y install --no-install-recommends git net-tools \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && a2enmod rewrite

# Install composer
# COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
RUN curl -sSL https://getcomposer.org/installer | php \
    && chmod +x composer.phar \
    && mv composer.phar /usr/local/bin/composer

# Install xdebug
# xdebug.client_host = 172.23.0.1 \n\
# xdebug.log = /workspace/.devcontainer/php/xdebug.log \n\
RUN pecl install xdebug-3.0.4 && \
    echo "\n\
    zend_extension=xdebug.so \n\
    xdebug.start_with_request = 1 \n\
    xdebug.discover_client_host = 1 \n\
    xdebug.mode=debug \n\
    xdebug.client_port = 9003 \n\
    " >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    docker-php-ext-enable xdebug

# Node
# [Choice] Node.js version: none, lts/*, 16, 14, 12, 10
# ARG NODE_VERSION="16"
# RUN if [ "${NODE_VERSION}" != "none" ]; then bash -c "umask 0002 && . /usr/local/share/nvm/nvm.sh && nvm install ${NODE_VERSION} 2>&1"; fi

# [Optional] Uncomment this line to install global node packages.
# RUN su vscode -c "source /usr/local/share/nvm/nvm.sh && npm install -g <your-package-here>" 2>&1
