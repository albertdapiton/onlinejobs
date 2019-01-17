#!/bin/bash
# Run composer commands inside workspace

cd docker
docker-compose exec workspace /bin/sh -c "/usr/local/bin/composer $*"
