FROM mysql:5.7

ADD dump.sql /docker-entrypoint-initdb.d

# to create a dump use the following command inside the container at /home/dump/:
# mysqldump -uwordpress -pwordpress wordpress > dump.sql

# to enter a running docker container use the following command:
# docker exec -ti <container name> /bin/bash
#
# e.g.:
# docker exec -ti website_db_1 /bin/bash
