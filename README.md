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

- after done above steps you can see API Collection ( Insomnia Support):
```shell
Go To Insomnia-Collection IN Root Folder
```

![shot240614_1](https://github.com/MimDeveloperTv/file/assets/84548594/07f64cb7-3003-4b60-abc3-0143e4559e26)

