<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';



// IF VOTER PRESSES UPVOTE
if (isset($_POST['up'])) {
  $id = $_SESSION["user"]["id"];
  $post_id = (int)$_POST['up'];
  $vote_dir = (int)$_POST['dir'];

  $query = 'INSERT INTO votes (user_id, vote_dir, post_id) VALUES (:user_id, :vote_dir, :post_id)';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
  $statement->bindParam(':vote_dir', $vote_dir, PDO::PARAM_INT);
  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);

  $statement->execute();


echo json_encode($id);
}

// IF VOTER PRESSES DOWNVOTE
if (isset($_POST['down'])) {
  $id = $_SESSION["user"]["id"];
  $post_id = (int)$_POST['down'];
  $vote_dir = (int)$_POST['dir'];

  $query = 'INSERT INTO votes (user_id, vote_dir, post_id) VALUES (:user_id, :vote_dir, :post_id)';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
  $statement->bindParam(':vote_dir', $vote_dir, PDO::PARAM_INT);
  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);

  $statement->execute();


echo json_encode($id);
}
