FROM nginx:alpine

RUN rm /etc/nginx/conf.d/default.conf

COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

COPY ./src /var/www/html

WORKDIR /var/www/html