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

// Code for a user to edit a comment she/he has posted

// GETTING THE ID FROM URL-BAR THAT WAS SENT FROM FORM ON editPost.php
$comment_id = $_GET['id'];

$comment_text = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
$post_id = $_POST['post_id'];
$posttime = date("M d, Y: H:i");


$query = 'UPDATE comments SET comment_text = :comment_text, posttime = :posttime WHERE comment_id = :comment_id';

$statement = $pdo->prepare($query);

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$statement->bindParam(':posttime', $posttime, PDO::PARAM_STR);
$statement->bindParam(':comment_text', $comment_text, PDO::PARAM_STR);
$statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);

$statement->execute();

redirect("../../pages/onePost.php?id=$post_id");
