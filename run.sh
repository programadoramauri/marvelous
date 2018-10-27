#!/bin/bash

echo Uploading Container
docker-compose up -d

echo Copying config example file
docker exec -it marvelous-app cp .env.example .env

echo Intalling Dependencies
docker exec -it marvelous-app composer install

echo Keygen
docker exec -it marvelous-app php artisan key:generate

echo Containers info
docker ps -a

echo Starting the engine
docker exec -it marvelous-app php artisan serve
