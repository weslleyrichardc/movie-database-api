# Movie Catalog API

This is a RESTful API for managing a movie catalog.

## Built With

- [**Symfony**](https://symfony.com) - PHP framework
- [**MySQL**](https://www.mysql.com) - Database management system
- [**Docker**](https://www.docker.com) - Containerization platform
- [**PHPUnit**](https://phpunit.de) - Testing framework

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites

To run this project, you'll need the following software installed on your machine:

- [**Docker**](https://docs.docker.com/get-docker/)
  - Docker Compose

## Installing

- Clone this repository to your local machine.
  - `git clone https://github.com/weslleyrichardc/movie-database-api.git`
- Navigate into the project directory.
  - `cd movie-database-api`
- **(Optional)** Create the .env.local file for local changes.
  - `cp .env .env.local`
- **(Optional)** Create the docker-compose.override.yml file for local changes.
  - `cp docker-compose.yml docker-compose.override.yml`
- Build and start the Docker containers.
  - `docker compose up -d --build`
- Install dependencies with Composer:
  - `docker compose exec php composer install`
- Create the database.
  - `docker compose exec php bin/console doctrine:database:create`
- Create all the tables using the migrations.
  - `docker compose exec php bin/console doctrine:migrations:migrate`
- **(Optional)** Load some test data.
  - `docker compose exec php bin/console doctrine:fixtures:load`

You should now be able to access the API at [localhost](http://localhost).

## [API Endpoints](http://localhost/api)

## Running Tests

To run the automated tests, execute the following command from the project root:

- `docker-compose exec php vendor/bin/phpunit`
