<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';
// GETTING THE ID FROM URL-BAR THAT WAS SENT FROM FORM ON editPost.php
  $comment_id = $_GET['id'];
  $post_id = $_POST['post_id'];

  $query = 'DELETE FROM comments WHERE comment_id=:comment_id';


  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);

  $statement->execute();

  redirect("../../pages/onePost.php?id=$post_id");
