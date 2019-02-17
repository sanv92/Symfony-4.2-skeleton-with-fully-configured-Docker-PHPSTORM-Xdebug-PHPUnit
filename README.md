# Symfony 4.2 skeleton with fully configured Docker, PHPSTORM, Xdebug, PHPUnit.

This document contains information on how to download,
install, and start using Symfony.

For a more detailed explanation,
see the Installation chapter of the Symfony Documentation.

## Installation
### Clone Repository
```
git clone git@github.com:SanderV1992/Symfony-4.2-skeleton-with-fully-configured-Docker-PHPSTORM-Xdebug-PHPUnit.git my-project
```

### Build Docker
1. cd ./docker
2. docker build .

### Run Docker-Compose
1. cd ./docker
2. docker-compose up

### Composer (Dependency Manager for PHP)
1. docker exec -it phpcli7.1_symfony_container /bin/bash
2. composer install

### Install PHPUnit
1. composer require symfony/maker-bundle --dev
2. composer require symfony/phpunit-bridge --dev
3. composer require symfony/profiler-pack --dev
4. composer remove phpunit/phpunit --dev
5. composer require --dev phpunit
6. copy new file phpunit.xml.dist -> phpunit.xml

### PHPSTORM
##### Current Project Interpreter
###### Select CLI Interpreter
- Select: `From Docker, Vagrant, VM, Remote`
- Remote: `Docker Compose`
- Server: `docker-compose`
- Configuration file: `./docker/docker-compose.yml`
- Service: `phpcli7.1_symfony_container`

###### Preferences | Languages & Frameworks > PHP
- CLI Interpreter: `phpcli7.1_symfony_container`
- Path mappings: `/srv/application`

##### Xdebug and PHPUnit
###### Preferences | Languages & Frameworks > PHP > Debug -> DBGp Proxy
- IDE Key: `PHPSTORM`
- Host: `localhost`
- Port: `9000`

###### Preferences | Languages & Frameworks > PHP > Servers
- Name: `localhost 8080`
- Host: `localhost`
- Port: `8080`
- Debugger: `Xdebug`
- Use path mapping: `yes`

File/Directory - Absolute path on the server
- `./public/index.php - /srv/application/public/index.php`
- `./src - /srv/application/src`

###### Preferences | Languages & Frameworks > PHP > Test Framework (create new configuration to allow PHPSTORM find PHPUnit):
- Interpreter: `phpcli7.1_symfony_container`
- CLI Interpreter: `phpcli7.1_symfony_container`
- Path mappings: `/srv/application`

PHPUnit library:
- PHPUnit library: `Use Composer autoloader`
- Path to script: `/srv/application/vendor/autoload.php`

Test Runner:
- Default configuration file: `/srv/application/phpunit.xml`

### Run/Debug configurations
###### PHP Remote Debugger
- name: `PHP Remote Debugger

Configuration:
- Filter debug connection by IDE key: `yes
- Server: `localhost 8080`
- IDE key(seccion id): `PHPSTORM`

###### Docker Compose
- name: `Docker Compose`
- Server: `docker-compose`
- Choose file: `./docker/docker-compose.yml`

### Stop Docker-Compose
1. cd ./docker
2. docker-compose down

### Run Docker-Compose via PHPSTORM
1. Click Docker Button in PHPSTORM toolbar
2. Connect to Docker
3. Run all docker container

---

More details documentation with screenshots, please visit this website:
https://everyone-can-code.github.io/symfony-setting-up-PhpStorm-with-Xdebug-and-Docker-configuration/
