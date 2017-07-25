#!/usr/bin/env bash
#title           :restore_sql.sh
#description     :Import the specified sqldump inside the mysql container.
#author          :christophe De Saint Léger
#date            :20170530
#version         :0.1
#usage           :bash restore_sql.sh database_name.sql
#notes           :The sql dump must be inside the current directory
#==============================================================================

DUMP=$1

cat $DUMP | docker exec -i dockerapache_mysql_1 /usr/bin/mysql -uroot -psecret
