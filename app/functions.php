<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
  /**
  * Redirect the user to given path.
  *
  * @param string $path
  *
  * @return void
  */
  function redirect($path)
  {
    header("Location: ${path}");
    exit;
  }
}

// FUNCTION TO SHOW DATABASE INFO ON PROFILE PAGE
function userInfo($pdo) {
  $id = (int)$_SESSION['user']['id'];
  $query = "SELECT * FROM users WHERE id = :id";

  $statement = $pdo->prepare($query);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();


  $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  return $resultQuery;
}

// FUNCTION TO PRINT OUT POSTS
function postsShow($pdo) {
  $query = "SELECT * FROM posts LEFT JOIN users ON posts.user_id=users.id ORDER BY post_id DESC";

  $statement = $pdo->prepare($query);
  $statement->execute();

  $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  return $resultQuery;
}

// FUNCTION TO GET CURRENT SESSIONS USERS POSTS
function userPosts($pdo) {
  $id = (int)$_SESSION['user']['id'];
  $query = "SELECT * FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE id = :id ORDER BY post_id DESC";

  $statement = $pdo->prepare($query);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  return $resultQuery;
}


// FUNCTION TO GET A SPECIFIC POST
function onePost($pdo) {
  if (isset($_SESSION['user'])) {
    $id = (int)$_SESSION['user']['id'];
  }

  $post_id = $_GET['id'];
  $query = 'SELECT * FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE post_id = :post_id';

  $statement = $pdo->prepare($query);

  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);

  $statement->execute();

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $post = $statement->fetch(PDO::FETCH_ASSOC);

  return $post;
}

// FUNCTION TO GET ALL COMMENTS ON POST
function comments($pdo) {
  if (isset($_SESSION['user'])) {
    $id = (int)$_SESSION['user']['id'];
  }

  $post_id = $_GET['id'];
  $query = 'SELECT comment_id, user_id, comment_text, posttime, username FROM comments INNER JOIN users ON comments.user_id=users.id WHERE post_id = :post_id ORDER BY comment_id DESC';

  $statement = $pdo->prepare($query);

  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);

  $statement->execute();

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $post = $statement->fetchAll(PDO::FETCH_ASSOC);

  return $post;
}


// FUNCTION TO GET SPECIFIC USER
function otherUser($pdo) {
  $id = $_GET['id'];
  $query = "SELECT id, name, username, email, biography, img FROM users WHERE id = :id";

  $statement = $pdo->prepare($query);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();


  $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  return $resultQuery;
}

// FUNCTION TO GET ANOTHER USERS POSTS
function otherUserPosts($pdo) {
  $id = $_GET['id'];
  $query = "SELECT * FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE id = :id ORDER BY post_id DESC";

  $statement = $pdo->prepare($query);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  return $resultQuery;
}

// SHOW SUM OF VOTES ON CERTAIN POST
function voteSum($pdo, $post_id) {

  $query = "SELECT sum(vote_dir) AS score FROM votes WHERE post_id=:post_id";

  $statement = $pdo->prepare($query);
  $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
  $statement->execute();

  $resultQuery = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  return $resultQuery;

}
