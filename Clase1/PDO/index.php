<?php

// Config para el modo de muestra de errores
// setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Escribir codigo a partir de esta linea

// Variables de Config
// $host = "localhost";
// $dbname = "movies_db";
// $port = "3306";
// $user = "root";
// $pass = "root";
// // end Variables de Config

// $dsn = "mysql:host=$host;dbname=$dbname;port=$port";
// // phpinfo(); ésto muestra la versión de PHP que hay instalada
// // exit;

// // try{
// //     $db = new PDO($dsn, $user, $pass);
// //     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// //     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
// // } catch(PDOException $e){
// //     echo $e->getMessage();
// //     die('No se pudo conectar');
// // }

// PARA HACERLO CON OBJETOS
require 'DB/Connector.php';
require 'DB/QueryBuilder.php';

// Tengo mi objeto PDO
$pdo = Connector::make();

$queryBuilder = new QueryBuilder($pdo);

$peliculas = $queryBuilder->indexMovies('movies');

$avatar = $queryBuilder->searchId('movies', '1');
var_dump($avatar);
exit;

// Armo queries
// $query = $pdo->query("SELECT * FROM movies");

// Armo mi array de peliculas $peliculas
// $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);

// Testeo con var_dump();
// var_dump($peliculas);

// No escribir codigo debajo de esta linea
require 'views/index.view.php';