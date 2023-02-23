## Book Store

-   CRUD operations for Book Store

## Running application

-   Open terminal and run `composer install`
-   Open another terminal and run `npm install` and `npm watch`
-   To create admin, run command `php artisan db:seed --class=UserSeeder`
    this will create admin user with below credential
    email: admin@admin.com
    password: password
-   To insert books, run command `php artisan db:seed --class=BookSeeder`
-   run `php artisan serve`
-   run `npm run watch`
-   open `http://localhost:8000` in browser

## Manage Books from Admin

-   open `http://localhost:8000` in browser and login with admin credentials (generated above).

## API Implementation

# Endpoint http://localhost:8000/api/books?
# Params
- keyword
- limit
- page