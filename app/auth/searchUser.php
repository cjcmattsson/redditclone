<?php

/*
 * This file is created by me. Hello!
 *
 * (c) Opflip AB, Christopher Mattsson
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Code to search for specific username and tell user if username is already taken
// and letting the user know so through a js fetch. returns json-code

$name = $_GET['username'];


$searchUser = "SELECT username FROM users
WHERE username= :username";
$statement = $pdo->prepare($searchUser);
$statement->bindParam(':username', $name, PDO::PARAM_STR);
$statement->execute();
$resultsearchUser = $statement->fetchALL(PDO::FETCH_ASSOC);
echo json_encode($resultsearchUser);
