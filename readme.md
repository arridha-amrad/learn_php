how to run the file :

php -S localhost:8000 <file_name>

:: (double colon)
is a token that allows access to a constant, static property, or static method of a class or one of its parents.

Naming a file containing a class
It's a convention in php
A file with a class starting with a capital letter

How to avoid SQL Injection ?
never inline your query with users input

When to use static keyword?
pure function (of a class) shoulb be static.
pure funcrion means a function that not depend on any properties outside the function itself.

What is public folder

- the root of your app
- where to store css, js, images
- prevent user to access any other files directly from url
  now running server by : php -S localhost:8000 -t public

Core folder

- move any generic functionalities to core folder

Database::class === Core\Database
(resolving the namespace)

The applications of our app stay in Http Directory
