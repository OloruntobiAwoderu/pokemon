# Pokemon API

## Objective

Your assignment is to create a Pokémon API from a CSV file using PHP and any framework.

## Brief

Professor Oak is in trouble! A wild Blastoise wreaked havoc in the server room and destroyed every single machine. There are no backups - everything is lost! Professor Oak quickly scribbles down all the Pokémon from memory and hands them to you on a piece of paper. (`/Data/pokemon.csv`). Your task is to restore the Pokémon Database from that file and create a Pokémon API so that they’re never lost again.

## Tasks

- Implement assignment using:
  - Language: **PHP**
  - Framework: **any framework**
- Create a Pokémon Model that includes all fields outlined in `/Data/pokemon.csv`
  - Pokémon can't have twice the same type
  - Type1 cannot be null, but Type2 can
- Parse the .csv file and create entries for each row based on the following conditions:
  - Exclude Legendary Pokémon
  - Exclude Pokémon of Type: Ghost
  - For Pokémon of Type: Steel, double their HP
  - For Pokémon of Type: Bug & Flying, increase their Attack Speed by 10%
  - For Pokémon that start with the letter **G**, add +5 Defense for every letter in their name (excluding **G**)
- Create one API endpoint `/pokemon`
  - This API endpoint should be searchable, filterable and paginatable
    - Search: name
      - e.g. `/pokemon?name=sand`
      - Should return the names containing the given characters
    - Filter: HP, Attack & Defense
      - e.g. `/pokemon?hp[gte]=100&defense[lte]=200`
    - Pagination: e.g. `/pokemon?page=1`
  - Search, filters and pagination can be combined
    - e.g. `/pokemon?name=charm&hp[gte]=100&page=2`

## Evaluation Criteria

- **PHP** best practices
- Show us your work through your commit history
- We're looking for you to produce working code, with enough room to demonstrate how to structure components in a small program
- Completeness: did you complete the features?
- Correctness: does the functionality act in sensible, thought-out ways?
- Maintainability: is it written in a clean, maintainable way?
- Testing: is the system adequately tested?

## CodeSubmit

Please organize, design, test and document your code as if it were going into production - then push your changes to the master branch. After you have pushed your code, you may submit the assignment on the assignment page.

All the best and happy coding,

The Ecochain Technologies Team


## API Documentation

### Usage
Change the .env.example to .env and add your database info

### Starting the dev server

```bash

php artisan migrate  --- Run migrations against our database

php artisan db:seed  --- To seed the database with data from the pokemon.csv file based on the set parameters

php artisan serve  -- To start our development server

```

### API Endpoint

Method        | Endpoint      | 
------------- | ------------- | 
GET           | /pokemon 

Query Params      | description  |
---------	| -------------------  
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
You will need to create an .env.testing similar to the .env.example but with credentials for the test db

You might also need to run - php artisan config:clear --env=testing  

php artisan migrate --env=testing

To run the tests - php artisan test  

```