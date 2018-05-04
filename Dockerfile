FROM jitesoft/node-base:9 as js
ENV NODE_ENV="production"
WORKDIR /app
COPY . /app
RUN npm install -g yarn && \
    yarn install && \
    yarn prod

# Set up container image.
FROM jitesoft/lighttpd
COPY --from=js /app/dist /var/www/html
