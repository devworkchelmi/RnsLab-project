FROM jenkins/jenkins:lts

USER root

# Installer PHP, Composer et utilitaires
RUN apt-get update && apt-get install -y \
    php \
    php-cli \
    php-mbstring \
    php-xml \
    git \
    unzip \
    curl \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && apt-get clean

USER jenkins

# Jenkins se lancera comme d'habitude
