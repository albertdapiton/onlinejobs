#!/bin/bash
# Run artisan commands inside workspace

cd docker
docker-compose exec workspace php artisan $*
