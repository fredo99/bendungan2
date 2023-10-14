FROM php:7.4
RUN docker-php-ext-install mysqli
# COPY bendungan/ /var/www/html/
COPY bendungan2 /var/www/html/bendungan
# WORKDIR /var/www/html
WORKDIR /var/www/html/bendungan
EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80"]