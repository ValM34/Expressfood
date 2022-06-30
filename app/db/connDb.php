<?php

$host = 'localhost';
$db = 'express_food';
$user = 'root';
$psw = 'root';
$port = '3306';
$charset = 'UTF8';
/* utf-8mb4 ? */
/* data source name */
$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
$options = [
    \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES     => false,
];

try {
    $pdo = new \PDO($dsn, $user, $psw, $options);
    echo 'Database connexion established! - ';
} catch (\PDOException $e) {
    throw new \PDOException ($e->getMessage(), $e->getCode());
}