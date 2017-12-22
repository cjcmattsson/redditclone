<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

// SHOW SUM OF VOTES ON CERTAIN POST

  $post_id = $_POST['post_id'];
  $query = "SELECT sum(vote_dir) AS score FROM votes WHERE post_id=:post_id";

  $statement = $pdo->prepare($query);
  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
  $statement->execute();

  $score = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

echo json_encode($score);
