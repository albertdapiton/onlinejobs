#!/usr/bin/env bash

cd docker
docker-compose exec workspace php artisan migrate:refresh --seed --force