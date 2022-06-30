<?php

// Db conn

require 'connDb.php';

$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("DROP TABLE users");
$pdo->exec("DROP TABLE deliverers");
$pdo->exec("DROP TABLE commands");
$pdo->exec("DROP TABLE today_s_special");
$pdo->exec("DROP TABLE meal");
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

echo 'Database TABLES deleted successfuly!';