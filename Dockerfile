FROM yiizh/php7

MAINTAINER Di Zhang <zhangdi_me@163.com>

ENV APP_ENV
ENV MYSQL_HOST
ENV MYSQL_DB
ENV MYSQL_USER
ENV MYSQL_PASS
ENV JUHE_APP_KEY

ENV APP_PATH=/app

WORKDIR $APP_PATH

COPY . $APP_PATH

RUN chmod -R 777 $APP_PATH/src/frontend/runtime \
    $APP_PATH/src/frontend/web/assets \
    $APP_PATH/src/console/runtime

RUN cd $APP_PATH && \
    composer config -g repo.packagist composer https://packagist.phpcomposer.com && \
    composer config -g github-oauth.github.com 4b3b4c18ac03400f34db8736524b34b31677fc4c && \
    composer global require "fxp/composer-asset-plugin:~1.2.0" && \
    composer install -vvv --prefer-dist --no-dev --optimize-autoloader

RUN sed -i "s/'YII_DEBUG', true/'YII_DEBUG', false/g" $APP_PATH/src/frontend/web/index.php && \
    sed -i "s/'YII_ENV', 'dev'/'YII_ENV', 'prod'/g" $APP_PATH/src/frontend/web/index.php

RUN rm -rf $APP_PATH/.env && rm -rf /var/www/html && ln -s $APP_PATH/src/frontend/web /var/www/html