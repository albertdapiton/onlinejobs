#!/usr/bin/env bash

cd docker
cd env-example .env
docker-compose up -d --build nginx mariadb redis