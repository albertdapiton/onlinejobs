#!/bin/bash
# Connect to the workspace container

cd docker
docker-compose exec mariadb /bin/sh -c "mysql -udefault -psecret default"