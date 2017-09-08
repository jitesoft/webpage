# Jitesoft Web Page

[![coverage report](https://gitlab.com/jitesoft/web/badges/master/coverage.svg)](https://gitlab.com/jitesoft/web/commits/master)  
[![pipeline status](https://gitlab.com/jitesoft/web/badges/master/pipeline.svg)](https://gitlab.com/jitesoft/web/commits/master)

## Development setup

The project uses docker and docker-compose for running all the services.  
There is two docker-compose files, one which is used in production and another one which is used to override 
the production file.  
  
To run the development environment use the following command:

```bash
> docker-compose up -d
```

The `-d` argument can be omitted if you wish to keep the logs running in the shell.

The containers have volumes which are shared between host and container, so only when updating the docker-compose 
files should there be any need to restart them.  
Database is persisted and so are all logs.
  
When done working on the project, run

```bash
> docker-compose down
```

In the project directory to terminate the containers.

## Deployment

When a branch is merged into master, a automatic deploy will be done.

## Migrate and Seed data

Migration and data seeders exists in the project.  
Each time you do a pull from git, it's recommended that you run the migrations and seeders so that you have 
the latest development (and currently production) data in the database.  
  
Easiest way to do this is running the command:  

```bash
docker exec web_fpm_1 php artisan migrate
docker exec web_fpm_1 php artisan db:seed
```

This will update all tables to the latest structure and then add the database rows missing in your database.
