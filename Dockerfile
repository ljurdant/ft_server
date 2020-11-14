# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: ljurdant <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/01/25 00:00:45 by ljurdant          #+#    #+#              #
#    Updated: 2020/03/03 15:49:22 by ljurdant         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	debian:buster

#LEMP install
RUN		apt-get update\
		&& apt-get install wget -y\
		&& apt-get install nginx -y\
		&& apt-get install default-mysql-server -y\
		&& apt-get install php7.3-fpm php-mysql -y

#Making php more secure
RUN 	echo "cgi.fix_pathinfo = 0;" >> /etc/php/7.3/fpm/php.ini

#SSL certificate
RUN		openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt -subj "/C=FR/ST=./L=Paris/O=ljurdant/OU=./CN=localhost"
COPY	./srcs/self-signed.conf /etc/nginx/snippets
COPY	./srcs/ssl-params.conf /etc/nginx/snippets

#Php test
COPY	./srcs/info.php /var/www/html		

#Creating mysql database
COPY	./srcs/mysql.sh /
RUN		bash mysql.sh

#Instaling  & linking Wordpress
RUN		wget https://wordpress.org/latest.tar.gz\
		&& tar -xzvf latest.tar.gz\
		&& apt-get install php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip -y\
		&& cp -a /wordpress/wp-config-sample.php /wordpress/wp-config.php
COPY	./srcs/wp-config.php /wordpress
RUN		rsync -avP /wordpress /var/www/html/\
		&& chown -R :www-data /var/www/html/*\
		&& mkdir /var/www/html/wp-content\
		&& mkdir /var/www/html/wp-content/uploads\
		&& chown -R :www-data /var/www/html/wp-content/uploads
COPY	./srcs/wordpress /etc/nginx/sites-available
RUN		ln -s /etc/nginx/sites-available/wordpress /etc/nginx/sites-enabled/\
		&& rm /etc/nginx/sites-enabled/default

#Installing and linking phpmyadmin
RUN		wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-english.tar.gz\
		&& tar -xvzf phpMyAdmin-latest-english.tar.gz\
		&& rm phpMyAdmin-latest-english.tar.gz\
		&& mv /phpMyAdmin-5.0.4-english /usr/share/phpmyadmin\
		&& ln -s /usr/share/phpmyadmin  /var/www/html/phpmyadmin

ENTRYPOINT service php7.3-fpm start && service mysql start && nginx -g 'daemon off;'
