## 1. Two Sum - Native
folder name : two_sum

## 2. Budget (Front End) - Laravel
folder name : budget
### Installation
- composer install
- copy env : cp .env.example .env
- add to env : API_SERVICE=http://localhost:8001/
- run application : php artisan serve
### demo account 
- username : test@gmail.com 
- password : 123 

## 3. Budget (API) - Lumen
folder name : budget_api
### Installation
- composer install
- copy env : cp .env.example .env
- create database for api, example: mc_pay
- change database configuration on env
- run application : php -S localhost:8001 -t ./public