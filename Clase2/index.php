<?php

// Config para el modo de muestra de errores
// setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Escribir codigo a partir de esta linea

require 'DB/Connector.php';
require 'DB/QueryBuilder.php';

// Tengo mi objeto PDO
$pdo = Connector::make();
$queryBuilder = new QueryBuilder($pdo);

$peliculas = $queryBuilder->index('movies');
$generos = $queryBuilder->index('genres');

if ($_POST)
{
    $queryBuilder->createMovie($_POST);
}



// No escribir codigo debajo de esta linea
require 'views/index.view.php';