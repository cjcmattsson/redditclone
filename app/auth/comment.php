<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['comment'])) {
  $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

  $post_id = $_GET['id'];
  $id = (int)$_SESSION['user']['id'];
  $posttime = date("M d, Y: H:i");


  $query = 'INSERT INTO comments (post_id, user_id, comment_text, posttime)
            VALUES (:post_id, :user_id, :comment_text, :posttime)';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':comment_text', $comment, PDO::PARAM_STR);
  $statement->bindParam(':user_id', $id, PDO::PARAM_STR);
  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
  $statement->bindParam(':posttime', $posttime, PDO::PARAM_STR);

  $statement->execute();

  redirect("../../pages/onePost.php?id=$post_id");

};
