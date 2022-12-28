# Stockbook
This is project to management of blogs, contacts and daily trading diary.

## Installation environment
- php version: __^7.2.5__

## Project installation steps

### Step 1
Download the source code from github.

Link: https://github.com/duylehoang/stockbook.git

### Step 2
Create __.env__ file and copy the content from .env.example file.

Declare database connection information
> DB_DATABASE = database_name
>
> DB_USERNAME= your_username
>
> DB_PASSWORD= your_password

### Step 3 : Install packages (in composer.json)
At root folder of project, run command line:
> composer install

### Step 4 
Run command line:
> php artisan key:generate

### Step 5
Create database
> php artisan migrate --seed