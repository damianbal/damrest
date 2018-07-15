
# DamRest

Tiny restful PHP framework for writing API's

## Getting Started

Clone repo and install depedencies with composer.
```
composer install
```

### How to use DamRest
Put your application routes in bootstrap.php file, using $router. All entities should be in Entities directory, one example Entity is within that folder.

To get data posted by POST use:
```
$someData = $request->getRawInput('input_name');
```
To get parameters from Route URI use:
```
$userID = $request->getParam('id'); 
```


## Built With

* [Enterium](https://github.com/damianbal/enterium/) - ORM and DB
* [dam-validator](https://github.com/damianbal/dam-validator) - Input validation

