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

// Code for a user to edit a post she/he has posted

// GETTING THE ID FROM URL-BAR THAT WAS SENT FROM FORM ON editPost.php
$post_id = $_GET['id'];

$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
$url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);
$posttime = date("M d, Y: H:i");


$query = 'UPDATE posts SET title = :title,
description = :description, url = :url, posttime = :posttime WHERE post_id = :post_id';

$statement = $pdo->prepare($query);

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$statement->bindParam(':title', $title, PDO::PARAM_STR);
$statement->bindParam(':description', $description, PDO::PARAM_STR);
$statement->bindParam(':url', $url, PDO::PARAM_STR);
$statement->bindParam(':posttime', $posttime, PDO::PARAM_STR);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);

$statement->execute();

redirect("../../pages/onePost.php?id=$post_id");
