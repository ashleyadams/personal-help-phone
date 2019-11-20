FROM mariadb:10.3

# Import a database for the first run
ENV MYSQL_ROOT_PASSWORD=password
COPY ./twilio.sql /docker-entrypoint-initdb.d/

# Reconfigure the server to use UTF-8 for everything
COPY ./config/mariadb.cnf /etc/mysql/mariadb.cnf
