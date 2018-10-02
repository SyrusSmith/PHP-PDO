<?php

class QueryBuilder
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function index($table)
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

    public function createMovie($data)
    {
        $statement = "INSERT INTO movies (title, ratings, awards, realese_date, length, genre_id) VALUES (:title, :ratings, :awards, :realese_date, :length, :genre_id)";

        $titulo = $data ['titulo'];
        $rating = $data['rating'];
        $premios = $data['premios'];
        $estreno = $data['anio'] . "-" . $data['mes'] . "-" . $data['dia'];
        $duracion = $data['duracion'];
        $genero = $data['genero'];

        $statement->bindParam(':title', $titulo, PDO::PARAM_STR);
        $statement->bindParam(':rating', $rating, PDO::PARAM_STR);
        $statement->bindParam(':awards', $premios, PDO::PARAM_INT);
        $statement->bindParam(':release_date', $estreno, PDO::PARAM_STR);
        $statement->bindParam(':length', $duracion, PDO::PARAM_INT);
        $statement->bindParam(':genre_id', $genero, PDO::PARAM_STR);

        $statement->execute();
    }
}