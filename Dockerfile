FROM jitesoft/composer as php
WORKDIR /app
COPY ./ /app
ENV APP_ENV="production"
RUN composer install --prefer-dist --no-interaction --no-progress --no-dev

FROM jitesoft/node-base as js
ENV NODE_ENV="production"
WORKDIR /app
COPY ./ /app
RUN npm install -g yarn gulp-cli && \
    yarn install && \
    gulp default

FROM jitesoft/php-fpm:7.2
COPY . /app
COPY --from=php /app/vendor /app/vendor
COPY --from=php /app/public/ /app/public

CMD [ 'setup.sh' ]
