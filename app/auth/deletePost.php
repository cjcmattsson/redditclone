<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';
// GETTING THE ID FROM URL-BAR THAT WAS SENT FROM FORM ON editPost.php
  $post_id = $_GET['id'];

  $query = 'DELETE FROM posts WHERE post_id=:post_id';


  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);

  $statement->execute();

  redirect('../../pages/posts.php');
