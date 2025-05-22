# UAE Code Test


## Installation

Follow the instructions below to install the app.

### Clone the repo

Run the following command in your terminal:

*Clone with HTTPS*
```
git clone https://github.com/AyeKhatKhatKhaing/UAE-Code-Test.git
```

### Install dependencies

Laravel use Composer to manage package dependencies. Make sure your development machine has Composer installed.

Go to your project root folder and run the following command:

```
composer install or composer update
```

### Create a local env file

To create a local env file, make a copy from example env file:

```
cp .env.example .env
```

### Generate PHP Key

To create a local env file, make a copy from example env file:

```
php artisan key:generate
```

Then update the config settings for database connection.

### Migrate the database

*Make sure your database connection settings are valid.*

Run the following command to create the database for the app:

```
php artisan migrate
```

### Prepare storage

Run the following command :

```
php artisan storage:link
```

### For Testing

Run the following command :

```
php artisan test
```
