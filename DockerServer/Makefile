type = patch
comment = Release $(type)
dir := $(shell pwd)
.PHONY: up
up:
	cd instalacao && docker-compose up -d

.PHONY: up-force
up-force:
	cd instalacao && docker-compose up --force-recreate -d

.PHONY: up-debug
up-debug:
	cd instalacao && docker-compose up

.PHONY: build
build:
	cd instalacao && docker-compose build

.PHONY: php
php:
	cd instalacao && docker-compose exec php bash

.PHONY: mysql
mysql:
	cd instalacao && docker-compose exec mysql56 bash

.PHONY: down
down:
	cd instalacao && docker-compose down

.PHONY: down-force
down-force:
	cd instalacao && docker-compose down --rmi all

.PHONY: restart
restart:
	cd instalacao && docker-compose down && docker-compose up --force-recreate -d

.PHONY: cache-clear
clear:
	cd instalacao && docker-compose exec php  php artisan cache:clear
