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

// Code to delete posts

// GETTING THE ID FROM URL-BAR THAT WAS SENT FROM FORM ON editPost.php
$post_id = $_GET['id'];

$query1 = 'DELETE FROM posts WHERE post_id=:post_id';
$query2 = 'DELETE FROM comments WHERE post_id=:post_id';


$statement1 = $pdo->prepare($query1);
$statement2 = $pdo->prepare($query2);

if (!$statement1) {
    die(var_dump($pdo->errorInfo()));
}
if (!$statement2) {
    die(var_dump($pdo->errorInfo()));
}

$statement1->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement2->bindParam(':post_id', $post_id, PDO::PARAM_INT);

$statement1->execute();
$statement2->execute();

redirect('../../pages/posts.php');
