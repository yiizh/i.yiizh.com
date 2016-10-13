#!/bin/bash

set -e

if [ ! -d "$APP_PATH/vendor" ]; then
    cd $APP_PATH && \
    composer config -g cache-dir /opt/composer/cache && \
    composer config -g repo.packagist composer https://packagist.phpcomposer.com && \
    composer global require "fxp/composer-asset-plugin:~1.1.1" && \
    composer install -vvv --prefer-dist --no-dev --optimize-autoloader
fi

source /etc/apache2/envvars && exec /usr/sbin/apache2 -DFOREGROUND