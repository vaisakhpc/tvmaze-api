# TVMaze API

[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

This repository contains the code to retrieve data from tvmaze api and run a strict typo check to return only strict matches 

## Steps to follow to deploy
```cp .env.example .env```

```docker-compose up -d --build```

### This will create containers for nginx, php, composer and redis services.
### nginx will be spun up in port 8099.
### url will look like 127.0.0.1:8099/api?q=deadwood
### To run php unit tests - ```docker exec -it <php container id> /bin/sh``` and run ```./vendor/bin/phpunit``` inside the container.


## Programming flow followed (DDD- Domain driven design)

### Lumen kernel identifies route from routes/web.php
### middleware for request validation will be called
### Route reaches Controller after successfull validation
### Domain class will be injected to the controller through DI
### Domain method will call the Service class (Search) 
### Search class will call all the other services like Redis, Client, etc as needed
### Domain class receives response from Search service class
### Controller receives response from Domain class
### middleware terminate will be called to log the responses in storage/logs/ directory
### Lumen outputs the response in json form

### Throwing exception is handled in Exception/Hanlder class (render method)
### Exception mapper is desgined to show the exception in a nice manner

