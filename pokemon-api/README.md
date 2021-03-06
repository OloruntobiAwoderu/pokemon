## API Documentation

### Usage
Change the .env.example to .env and add your database info

### Starting the dev server

```bash
Run composer install or php composer.phar install

php artisan key:generate

php artisan migrate  --- Run migrations against our database

php artisan db:seed  --- To seed the database with data from the pokemon.csv file based on the set parameters

php artisan serve  -- To start our development server

```

### API Endpoint

Method        | Endpoint      | 
------------- | ------------- | 
GET           | /pokemon 

Query Params      | description  |
---------	| -------------------  |
hp[gt]		| To filter and return pokemon with hp greater than the set value             |
hp[gte]	    | To filter and return pokemon with hp greater than or equal to the set value |
hp[lte]     | To filter and return pokemon with hp less than or equal to the set value    |
hp[lt]		| To filter and return pokemon with hp less than the set value                |
name        | To search and return pokemon with the name that matches the set value       |
attack[gt]  | To filter and return pokemon with attack greater than the set value         | 
attack[gte]	| To filter and return pokemon with attack greater than or equal to the set value |
attack[lte] | To filter and return pokemon with attack less than or equal to the set value   |
attack[lt]  | To filter and return pokemon with attack less than the set value                | 
defense[gt]  | To filter and return pokemon with defense greater than the set value             | 
defense[gte] | To filter and return pokemon with defense greater than or equal to the set value |
defense[lte] | To filter and return pokemon with defense less than or equal to the set value    |
defense[lt]  | To filter and return pokemon with defense less than the set value                |
page         | To return the list of pokemon based on the set value of the page (pagination)    |    


### Test
```bash

To run the tests - php artisan test  

```