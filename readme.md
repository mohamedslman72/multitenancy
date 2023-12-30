# Multi tenancy project



# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/mohamedslman72/multitenancy.git

Switch to the repo folder

    cd multitenancy

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)
    
    
    php artisan migrate --path=database/migrations/landlord
    php artisan migrate
    php artisan db:seed --class=TenantsTableSeeder
    php artisan db:seed --class=UsersTableSeeder
    php artisan ui bootstrap --auth
    npm install
    npm run dev

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/mohamedslman72/multitenancy.git
    cd multitenancy
    composer install
    cp .env.example .env
    php artisan key:generate

    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

  
    php artisan migrate
    php artisan migrate --path=database/migrations/landlord
    php artisan db:seed --class=TenantsTableSeeder
    php artisan db:seed --class=UsersTableSeeder
    php artisan ui bootstrap --auth
    npm install
    npm run dev
    php artisan serve


    



# Code overview

## Dependencies

- [laravel-cors](https://github.com/barryvdh/laravel-cors) - For handling Cross-Origin Resource Sharing (CORS)

## Folders

- `app` - Contains all the Eloquent models and controllers 
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
- `tests` - Contains all the application tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
to login use the following email and password
     email : "user1@tenant1.com"
     password : "password"
   or
    email : "user2@tenant2.com"
    password : "password"
and to see all users that belonging to user's authenticated tenant_id go to /users

