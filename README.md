# Airbnb Clone 

This is an open project of Airbnb clone using the technologies of Laravel and Nuxt.  

## Build Steps 

`Backend`
```bash

cd airbnb-clone-backend

cp .env.example .env

composer install

npm install

```

create a local databse according to your prefer name, then 

```bash

php artisan key:generate

php artisan migrate

```

`Frontend`
```bash

cd airbnb-clone-user

npm install

```