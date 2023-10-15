FROM php:7.4
RUN docker-php-ext-install mysqli
# # COPY bendungan/ /var/www/html/
# COPY . /var/www/html/
# # WORKDIR /var/www/html
# WORKDIR /var/www/html
# EXPOSE 80
# CMD ["php", "-S", "0.0.0.0:80"]