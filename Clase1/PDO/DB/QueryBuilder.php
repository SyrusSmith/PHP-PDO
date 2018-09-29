<?php

class QueryBuilder
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function indexMovies($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        //$statement es = a $stmt

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchId($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}