<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

// Code for the vote-procedure

// IF VOTER PRESSES UPVOTE
if (isset($_POST['up'])) {
  $id = $_SESSION["user"]["id"];
  $post_id = (int)$_POST['up'];
  $vote_dir = (int)$_POST['dir'];

  // CHECK IF VOTER HAS ALREADY VOTED UP
  $voteCheckQuery = 'SELECT user_id, vote_dir, post_id FROM votes
  WHERE user_id=:user_id AND post_id=:post_id';

  $voteCheck = $pdo->prepare($voteCheckQuery);

  if (!$voteCheck) {
    die(var_dump($pdo->errorInfo()));
  }

  $voteCheck->bindParam(':user_id', $id, PDO::PARAM_INT);
  // $voteCheck->bindParam(':vote_dir', $vote_dir, PDO::PARAM_INT);
  $voteCheck->bindParam(':post_id', $post_id, PDO::PARAM_INT);

  $voteCheck->execute();

  $resultQuery = $voteCheck->fetch(PDO::FETCH_ASSOC);


  // IF USER HAS VOTED UP ON POST, DO NOTHING
  if ((int)$resultQuery['vote_dir'] === $vote_dir) {
    echo json_encode("nothing");
  }
  // IF VOTER HAS VOTED DOWN EARLIER, UPDATE TO UPVOTE
  else if (isset($resultQuery['vote_dir']) && (int)$resultQuery['vote_dir'] !== $vote_dir) {

    $query = 'UPDATE votes SET vote_dir = :vote_dir WHERE user_id=:user_id AND post_id=:post_id';

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
  // IF VOTER NEVER VOTE BEFORE, INSERT UPVOTE
  else if ($resultQuery === false) {
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
}


// IF VOTER PRESSES DOWNVOTE
if (isset($_POST['down'])) {
  $id = $_SESSION["user"]["id"];
  $post_id = (int)$_POST['down'];
  $vote_dir = (int)$_POST['dir'];

  $voteCheckQuery = 'SELECT user_id, vote_dir, post_id FROM votes
  WHERE user_id=:user_id AND post_id=:post_id';

  $voteCheck = $pdo->prepare($voteCheckQuery);

  if (!$voteCheck) {
    die(var_dump($pdo->errorInfo()));
  }

  $voteCheck->bindParam(':user_id', $id, PDO::PARAM_INT);
  // $voteCheck->bindParam(':vote_dir', $vote_dir, PDO::PARAM_INT);
  $voteCheck->bindParam(':post_id', $post_id, PDO::PARAM_INT);

  $voteCheck->execute();

  $resultQuery = $voteCheck->fetch(PDO::FETCH_ASSOC);

  // IF USER HAS VOTED DOWN ON POST, DO NOTHING
  if ((int)$resultQuery['vote_dir'] === $vote_dir) {
    echo json_encode("nothing");
  }
  // IF VOTER HAS VOTED UP EARLIER, UPDATE TO DOWNVOTE
  else if (isset($resultQuery['vote_dir']) && (int)$resultQuery['vote_dir'] !== $vote_dir) {

    $query = 'UPDATE votes SET vote_dir=:vote_dir WHERE user_id=:user_id AND post_id=:post_id';

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
  // IF VOTER NEVER VOTE BEFORE, INSERT DOWNVOTE
  else if (!$resultQuery) {
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
}
