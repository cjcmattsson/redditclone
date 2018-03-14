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

// Function adds a vote value of 0 to a new posted post
// Needed because function to print out posts need each post to have a vote value

$latestPost = lastNewPost($pdo);

$id = (int)$_SESSION['user']['id'];
$post_id = $latestPost['post_id'];
$query = 'INSERT INTO votes (post_id, user_id, vote_dir) VALUES (:post_id, :id, 0)';

$statement = $pdo->prepare($query);

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();

redirect('../../pages/posts.php');
