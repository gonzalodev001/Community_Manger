#!/bin/bash

DOCKER_BE = community-manager-backend
DOCKER_FE = community-manager-frontend
DOCKER_DB = community-manager-db
OS = $(shell uname)
UID = $(shell id -u)

NAMESERVER_IP = $(shell ip address | grep docker0)

ifeq ($(OS),Darwin)
	NAMESERVER_IP = host.docker.internal
else ifeq ($(NAMESERVER_IP),)
	NAMESERVER_IP = $(shell grep nameserver /etc/resolv.conf  | cut -d ' ' -f2)
else
	NAMESERVER_IP = 172.17.0.1
endif

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

run: ## Start the containers
	docker network create community-manager-network || true
	cp -n .env .env.local || true
	cp -n docker compose.yml.dist docker compose.yml || true
	U_ID=${UID} HOST=${NAMESERVER_IP} docker compose up -d

stop: ## Stop the containers
	U_ID=${UID} docker compose stop

restart: ## Restart the containers
	$(MAKE) stop && $(MAKE) run

build: ## Rebuilds all the containers
	U_ID=${UID} docker compose build

prepare: ## Runs backend commands
	$(MAKE) composer-install

migrations: ## Execute the doctrine migrations
	U_ID=${UID} docker exec --user ${UID} -it ${DOCKER_BE} php bin/console make:migration
	U_ID=${UID} docker exec --user ${UID} -it ${DOCKER_BE} php bin/console doctrine:migrations:migrate

# Backend commands
composer-install: ## Installs composer dependencies
	U_ID=${UID} docker exec --user ${UID} -it ${DOCKER_BE} composer install --no-scripts --no-interaction --optimize-autoloader

be-logs: ## Tails the Symfony dev log
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} tail -f var/log/dev.log
# End backend commands

ssh-be: ## ssh's into the be container
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bash

ssh-fe: # ssh's into the fronted container
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_FE}  /bin/sh 

ssh-db: # ssh's into the DATABASE Mysql container
	U_ID=${UID} docker exec -it ${DOCKER_DB} bash

code-style: ## Runs php-cs to fix code styling following Symfony rules
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} php-cs-fixer fix src --rules=@Symfony

generate-ssh-keys: ## Generates SSH keys for JWT library
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} mkdir -p config/jwt
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} openssl genrsa -passout pass:6f30493c10c5d65258b98bb17ab49186 -out config/jwt/private.pem -aes256 4096
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} openssl rsa -pubout -passin pass:6f30493c10c5d65258b98bb17ab49186 -in config/jwt/private.pem -out config/jwt/public.pem
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} chmod 644 config/jwt/private.pem
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} chmod 644 config/jwt/public.pem