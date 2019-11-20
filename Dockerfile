
FROM centos:7.6.1810

RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
 && rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

# normal updates
RUN yum -y update

# PHP and httpd
RUN yum -y install \
    php72w php72w-cli php72w-opcache php72w-common php72w-gd \
    php72w-intl php72w-mbstring php72w-mcrypt php72w-mysql \
    php72w-pdo php72w-pear php72w-soap php72w-xml php72w-xmlrpc php72w-bcmath \
    httpd mod_ssl openssl mod_rewrite mod_alias mod_headers mod_expires mod_filter  \
    php72w-devel gcc python-mysqldb libpng-devel \
    php72w-pecl-igbinary php72w-pecl-redis libtool

RUN pecl install xdebug-2.6.0

# tools
RUN yum -y install \
    epel-release iproute at curl crontabs git nano subversion \
    nodejs-grunt-cli.noarch autoconf libtool nasm gcc-c++

# Configure system-level stuff first
RUN ln -sf /usr/share/zoneinfo/UTC /etc/localtime \
	&& echo "NETWORKING=yes" > /etc/sysconfig/network

# Set up some Apache config
RUN sed -i ':a;N;$!ba;s/AllowOverride None/AllowOverride All/2' /etc/httpd/conf/httpd.conf

# Suppress a server name warning from Apache
COPY docker/config/server-name.conf /etc/httpd/conf.modules.d/

# This was found to be necessary, on Mac only? Windows hosts seems to
# run without
COPY docker/install/start-webserver-container.sh /root/bin/


# Now the CMD is a Bash file, we need an init process,
# so that child processes respond to Unix sigs correctly
RUN yum -y install wget
RUN wget -O /usr/local/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.2/dumb-init_1.2.2_amd64
RUN chmod +x /usr/local/bin/dumb-init


# Set up the PHP TZ
COPY docker/config/timezone.ini /etc/php.d/
COPY docker/config/xdebug.ini /etc/php.d/

# Set up Apache site
COPY docker/config/000-default.conf /etc/httpd/conf.d/000-default.conf

# To avoid problems with firewalls
RUN git config --global url."https://".insteadOf git://

# Install Composer
RUN yum -y install wget unzip
COPY docker/install /root/bin
RUN cd /root/bin && \
    sh /root/bin/install-composer.sh && \
    ln -s /root/bin/composer.phar /usr/bin/composer

# Create Log Folder
RUN mkdir /var/log/docker
RUN chown apache /var/log/docker

ENV container docker

WORKDIR /var/www/html
VOLUME /var/www/html

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/dumb-init", "--"]
CMD ["sh", "/root/bin/start-webserver-container.sh"]
