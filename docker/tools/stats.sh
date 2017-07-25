#!/usr/bin/env bash
#title           :stats.sh
#description     :Show metrics of running containers
#author          :christophe De Saint Léger
#date            :20170530
#version         :0.1
#usage           :bash stats.sh
#notes           :
#==============================================================================

docker stats --format "table {{.Container}}\t{{.Name}}\t{{.CPUPerc}}\t{{.MemUsage}}\t{{.MemPerc}}\t{{.NetIO}}\t{{.BlockIO}}\t{{.PIDs}}"
