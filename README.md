# Laravel 10  Livewire + Tailwind

# Author

Esteban Villa R.

2025


#Description
Test carried out for Farmalink company.


# Step by step
- run in terminal: npm install
- run in terminal: php artisan migrate
- run in terminal: php artisan run serve
- Import database db.sql
   

# Login in
--http://127.0.0.1:8000/login
-- User : e@e.com
-- Pass : 123




# Stack:

- app @ php:8.1-fpm-alpine
- nginx @ nginx:alpine
- mysql @ mysql
- redis @ redis:alpine
- worker-local @ php:8.2-alpine3.16

## TODO

- figure out where else VITE_PORT is used. https://news.ycombinator.com/item?id=32085349
- hook up worker-local so you have a queue to play with
- create an example job/worker you might co-locate on same hardware
- maybe add some ci/cd and even k8s stuff as an example to scale out workers/nginx/edges

## Notes

- docker/app docker/nginx will rely on supervisor to maintain their processes, yawn
- Please see .env "#PORT FORWARDS" before starting in docker-compose
- 

## Installation

The default docker-compose config here exposes ports if you want them.  See .env's "PORT FORWARDS"

```shell
cp ./env.example ./.env
docker-compose up --build -d app nginx mysql
docker-compose exec app php artisan migrate

# grab a shell inside docker/app
docker-compose exec -u root app /bin/sh

# then, inside shell
npm install

# vite
npm run dev -- --host
```

You can now access http://localhost:8022 (or whatever your FORWARD_NGINX_PORT is).

Please keep ./composer.lock in docker/app container context, for example:

```shell
docker-compose exec -u root app /bin/sh
# then...
# COMPOSER_MEMORY_LIMIT=-1 app composer install
# COMPOSER_MEMORY_LIMIT=-1 app composer require awesome/package_etc
# ymmv w/ COMPOSER_MEMORY_LIMIT maybe try without
```
