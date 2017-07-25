#!/usr/bin/env bash

echo "grant all privileges on *.* to 'root'@'%' with grant option;"| docker exec -i dockerapache_mysql_1 /usr/bin/mysql -uroot -psecret
echo "SET GLOBAL max_allowed_packet =64 *1024 *1024" | docker exec -i dockerapache_mysql_1 /usr/bin/mysql -uroot -psecret 
