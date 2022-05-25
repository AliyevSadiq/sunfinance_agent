FROM php:7.4-fpm

# Cleaning and updating packages
RUN apt-get autoremove && apt-get autoclean && apt-get update --fix-missing

# Installing libraries
RUN apt-get install -y  libpq-dev zlib1g-dev libicu-dev libzip-dev procps \
    libfreetype6-dev  && rm -rf /var/lib/apt/lists/*

# Enabling && configuring php extensions
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gd

# Installing php extensions
RUN docker-php-ext-install pdo  pgsql pdo_pgsql  intl -j $(nproc) gd zip sockets

# Creating user for container.
RUN groupadd -g 1000 appuser_agent && useradd -r -u 1000 -g appuser_agent appuser_agent
USER appuser_agent

WORKDIR /app
