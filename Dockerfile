FROM wordpress:latest

ARG MYSQLPASSWORD=DDBD42AcF4hF1BF4F43DDCf62fdAEDH-
ARG MYSQLHOST=monorail.proxy.rlwy.net
ARG MYSQLPORT=49038
ARG MYSQLDATABASE=railway
ARG MYSQLUSER=root
ARG SIZE_LIMIT=50M

ENV WORDPRESS_DB_HOST=$MYSQLHOST:$MYSQLPORT
ENV WORDPRESS_DB_NAME=$MYSQLDATABASE
ENV WORDPRESS_DB_USER=$MYSQLUSER
ENV WORDPRESS_DB_PASSWORD=$MYSQLPASSWORD
ENV WORDPRESS_TABLE_PREFIX="RW_"

RUN echo "ServerName 0.0.0.0" >> /etc/apache2/apache2.conf
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf

# Set the maximum upload file size directly in the PHP configuration
RUN echo "upload_max_filesize = $SIZE_LIMIT" >> /usr/local/etc/php/php.ini
RUN echo "post_max_size = $SIZE_LIMIT" >> /usr/local/etc/php/php.ini

CMD ["apache2-foreground"]
