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

// CODE TO SHOW SUM OF VOTES ON CERTAIN POST

$post_id = (int)$_POST['post_id'];
$query = "SELECT sum(vote_dir) AS score FROM votes WHERE post_id=:post_id";

$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();

$score = $statement->fetch(PDO::FETCH_ASSOC);

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

echo json_encode($score);
