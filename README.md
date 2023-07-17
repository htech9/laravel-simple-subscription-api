

## (Demo) Post subscription API with Laravel
Showcase of event driven pattern in action with Laravel.

### Overview
The goal of this basic application is to let some users to subscribe to some website so that they get notified when a new post have been published.

This is very basic API endpoints that is able to:
- make a user subscribe to a specific `website`.
- create a `post` for a specific `website`
- notify all `subscribers` when a `post` is published by listening to `event`.

### How to run
#### Prerequisites

- The following tools / packages are required to be installed:
php , composer, docker
- create .env file were you can inspire values from .env.example file.
- run `composer install` 
- run `docker-compose up`

#### Run the application
- run `php artisan serve`

#### Run the tests
- run `php artisan test`

### Stacks:
- Laravel 8
- Php 7+
- Mysql8

### Api documentation
Here is the API document following Open API specification:
https://www.postman.com/htech9/workspace/htech9-public/api/5d90fa0b-575e-4f40-a6cd-4501377d0dd8?version=811913a2-81c4-4627-9191-13f6b4e53b28&tab=define
