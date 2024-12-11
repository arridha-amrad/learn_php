<?php

class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $user = 'root', $password = '')
    {
        // connect to mysql db
        $dsn = "mysql:" . http_build_query($config, '', ";");

        // dsn = data source name

        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function find_or_fail()
    {
        $result = $this->find();

        if (!$result) {
            abort(Response::NOT_FOUND);
        }

        return $result;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
}
