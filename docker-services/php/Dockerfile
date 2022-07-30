FROM php:7.4-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt update && apt install -y \
    jpegoptim optipng pngquant gifsicle \
    libjpeg62-turbo-dev \
    libc6 groff less \
    libfreetype6-dev \
    build-essential \
    mariadb-client \
    libonig-dev \
    libjpeg-dev \
    libpng-dev \
    libzip-dev \
    zlib1g-dev \
    libpq-dev \
    locales \
    locate \
    unzip \
    curl \
    zip \
    vim \
    git \
    python2

# Clear cache
RUN apt clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql zip mysqli mbstring exif pcntl bcmath
RUN docker-php-ext-install -j$(nproc) iconv
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt install symfony-cli

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www


# Copy existing application directory permissions
COPY --chown=www:www . /var/www
RUN chown -R www /var/www

WORKDIR /var/www

# Install nvm
RUN mkdir /usr/local/nvm
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 14.18.2

RUN chown -R www /usr/local/nvm

# Change current user to www
USER www

SHELL ["/bin/bash", "-c"]

RUN curl https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip -o awscliv2.zip
RUN unzip awscliv2.zip
USER root
RUN ./aws/install
RUN rm awscliv2.zip
RUN rm -rf ./aws

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
RUN source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default

# Add node and npm to path so the commands are available
ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
