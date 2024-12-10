<!-- It's a convention in php -->
<!-- A file with a class starting with a capital letter -->

<?php

class Database
{
    private $connection;

    public function __construct()
    {
        // connect to mysql db
        $dsn = "mysql:host=127.0.0.1;port=3306;dbname=learn_php;user=root;charset=utf8mb4";
        // dsn = data source name

        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}
