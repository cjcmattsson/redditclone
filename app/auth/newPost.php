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

// Code to insert info user has entered into form when creating a new posts
// into posts-database

if (isset($_POST['title'], $_POST['description'], $_POST['url'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);
    $id = (int)$_SESSION['user']['id'];
    $posttime = date("M d, Y: H:i");


    $query = 'INSERT INTO posts (user_id, title, description, url, posttime)
  VALUES (:id, :title, :description, :url, :posttime)';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':url', $url, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':posttime', $posttime, PDO::PARAM_STR);

    $statement->execute();

    redirect('addVoteNewPost.php?id=');
};
