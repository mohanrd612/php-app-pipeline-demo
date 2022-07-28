FROM mysql/mysql-server
USER root
COPY db_user.sql /docker-entrypoint-initdb.d/db_user.sql

ENV MYSQL_ROOT_PASSWORD root

EXPOSE 3306