# LARAVEL5.5-APIRESTFUL
```
    API REST FUL using laravel 5.5 
```

## INSTALL WITH COMPOSER

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install
```

## all endpoints can be used with postman in a simple way

## GETTING WITH CURL
```
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books?token= :token
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books/:id?token=:token
    $ curl -H 'content-type: application/json' -v -X POST -d '{"title":"Foo bar","author":"Foo author"}' http://localhost:8000/api/books?token=:token
    $ curl -H 'content-type: application/json' -v -X PUT -d '{"title":"Foo bar","author":"Foo author"}' http://localhost:8000/api/books/:id?token=:token
    $ curl -H 'content-type: application/json' -v -X DELETE http://localhost:8000/api/books/:id?token=:token
```
## USER REGISTRATION WITH CURL
```	
	$ curl  -H 'content-type: application/json' -v -X POST -d '{"name":"tony","email":"admin@admin.com","password":"password"}' http://localhost:8000/api/auth/signup
```
## USER AUTHENTICATION WITH CURL
```
	$ curl  -H 'content-type: application/json' -v -X POST -d '{"email":"admin@admin.com","password":"password"}' http://localhost:8000/api/auth/login
```

## VERSION CONTROL
``` 
    This project was created with version control, I am using v1 for this example, the files are defined in app/Api/V1
```


## Creator @vitormicillo
## bravomobile.it

# I would love a beer
https://beerpay.io/vitormicillo/laravel5.5-APIRESTFUL/badge.svg?style=flat
