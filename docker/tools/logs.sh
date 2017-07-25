#!/usr/bin/env bash
#title           :logs.sh
#description     :Show the container logs in real time.
#author          :christophe De Saint Léger
#date            :20170530
#version         :0.1
#usage           :bash logs.sh
#notes           :
#==============================================================================

docker logs --tail 100 -f dockerapache_httpd_1 
