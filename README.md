#### Install & Requirements

<br>

- create environment file:
```shell
cp .env.example .env
```
- fill the environment variables

<br>

- install packages with composer:
```shell
composer install
```
<br>

- Set Directory Permissions:
```shell
chmod 777 -R ./storage
```
<br>

- get project up and running:
```shell
docker compose up -d
```
<br>

- connect into cointainer terminal and run commands:
```shell
php artisan migrate
php artisan optimize:clear
```
