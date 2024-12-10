<!-- It's a convention in php -->
<!-- A file with a class starting with a capital letter -->

<?php

class Database
{
    private $connection;

    public function __construct($config, $user = 'root', $password = '')
    {
        // connect to mysql db
        $dsn = "mysql:" . http_build_query($config, '', ";");

        // dsn = data source name

        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}
