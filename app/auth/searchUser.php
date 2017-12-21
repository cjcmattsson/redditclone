<?php
declare(strict_types=1);
// Always start by loading the default application setup.
require __DIR__.'/../autoload.php';
$name = $_GET['username'];
// Wildcard below
// ."%";
$searchUser = "SELECT username FROM users
               WHERE username= :username";
$statement = $pdo->prepare($searchUser);
$statement->bindParam(':username', $name, PDO::PARAM_STR);
$statement->execute();
$resultsearchUser = $statement->fetchALL(PDO::FETCH_ASSOC);
echo json_encode($resultsearchUser);
