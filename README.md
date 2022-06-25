## Getting Strated

### Installation

Clone the repository

~~~
https://github.com/syahdham/stisla-laravel-base.git
~~~
or
~~~
git@github.com:syahdham/stisla-laravel-base.git
~~~

Switch to the repo folder

~~~
cd stisla-laravel-base
~~~

Install all the dependencies using composer

~~~
composer install
~~~
and
~~~
npm/yarn install
~~~

Copy the example env file and make the required configuration changes in the .env file

~~~
cp .env.example .env
~~~

Generate a new app key

~~~
php artisan key:generate
~~~

Run database migration and seeder (<b>Make sure you've already set the database connection in .env</b>)

~~~
php artisan migrate --seed
~~~

Start the local development server

~~~
php artisan serve
~~~

You can access the server at http://localhost:8000

### Documentation

Laravel : https://laravel.com/

Stisla Template : https://getstisla.com/





