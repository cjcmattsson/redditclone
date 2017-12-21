<?php

declare(strict_types=1);



require __DIR__.'/../autoload.php';
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