FROM php:7.3-apache
FROM registry.redhat.io/ubi8/ubi:8.0-122
COPY ./sampleapp2/php/* /app
COPY ./sampleapp2/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN chgrp -R 0 /app
RUN chmod -R g=u /app
RUN chown -R www-data:www-data /app && a2enmod rewrite
RUN curl -L https://github.com/stedolan/jq/releases/download/jq-1.6/jq-linux64 -o jq \
  && chmod +x ./jq && cp jq /usr/bin
