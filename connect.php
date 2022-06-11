<?php

header('User-Agent: The MTG Source/1.0 [(MTG card resrouces @ https://themtgsource.com)]');


$host = 'localhost:XXXX';
$db   = 'themtgso_CardDB';
$user = 'themtgso_source';
$pass = 'XXXX';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
      $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


$host2 = 'localhost:XXXX';
$db2   = 'themtgso_articles';
$user2 = 'themtgso_source';
$pass2 = 'XXXX';
$charset2 = 'utf8mb4';

$dsn2 = "mysql:host=$host2;dbname=$db2;charset=$charset2;";
$options2 = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
      $pdo2 = new PDO($dsn2, $user2, $pass2, $options2);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


$host3 = 'localhost:XXXX';
$db3   = 'themtgso_decks';
$user3 = 'themtgso_source';
$pass3 = 'XXXX';
$charset3 = 'utf8mb4';

$dsn3 = "mysql:host=$host3;dbname=$db3;charset=$charset3;";
$options3 = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
      $pdo3 = new PDO($dsn3, $user3, $pass3, $options3);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>
