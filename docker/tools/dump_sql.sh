#!/usr/bin/env bash
#title           :dump_sql.sh
#description     :Create a sql dump for the specified database.
#author		 :christophe De Saint Léger
#date            :20170530
#version         :0.1
#usage		 :bash dump_sql.sh database_name
#notes           :The dump will be stored inside the current directory
#==============================================================================

DATABASE=$1

docker exec dockerapache_mysql_1 /usr/bin/mysqldump --databases -uroot -psecret $DATABASE > $DATABASE.sql
