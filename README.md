# FERRER-MASSON-Test
test


This project sample was made using symfony
No styles were added and no Test aswell
I've just created some Dockerfiles for the set up and added an entity and a crud controller

Used:
php 8.0-fpm
symfony 5
node latest
nginx stable-alpine
mysql  8

To run:
after clone
go to root folder and checkout master then pull
go to the project root folder and execute docker-compose up -d --build
docker exec -it php-container bash
composer install and composer update
docker exec -it node-container bash
docker-compose run --rm node-service

To run tests:

docker exec -it php-container bash
composer require liorchamla/symfony-test-helpers
vendor/bin/phpunit

