~Steps for installation~
Version: Laravel 8

Database: backend_coding_test
Databse user: root
Databse pass: 

Please watch simple video demo:
"Demo.mp4"

Please input command:
composer install
php artisan migrate:fresh --seed
php artisan serve





- Say for example, we need a feature where we can display featured products. How would you go about implementing this feature? (You don't need to write code for this, just describe how would you implement it)


The product can be featured by:
1 calculating the number of user search the product appeared.
2 The number of user who bought the products within the day/week.
3 Depending on the cached save on users browser. We can show the products on their interest.



<!-- 
# iThinkWeb Backend developer coding test

## Task
You're tasked to create a simple REST web service application for an e-commerce app using Laravel.

You need to develop APIs for creating and viewing a single product. There should also be an API for viewing a list of the products.

A product needs to have the following information:

- Product name
- Product description
- Product price
- Created at
- Updated at

## Requirements
- The product name should have a maximum of 255 characters, and the product price should be numeric that accepts up to two decimal places.
- The created at and updated at fields should be in timestamp format.
- The view products list API needs to be paginated.
- You are required to use MySQL for the database storage in this test.
- You are free to use any library or component just as long as it can be installed using Composer.
- Don't forget to provide instructions on how to set the application up.

## Optional (for bonus points)
- Cache the view single product API. You are free to use any cache driver
- Create automated tests for the APIs
- Say for example, we need a feature where we can display featured products. How would you go about implementing this feature? (You don't need to write code for this, just describe how would you implement it)

 -->
