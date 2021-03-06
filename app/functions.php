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
function userInfo($pdo)
{
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

// FUNCTION TO SHOW DATABASE INFO ON RANDOM USERS
function randomUsers($pdo)
{
    $query = "SELECT * FROM users ORDER BY RANDOM() LIMIT 3";

    $statement = $pdo->prepare($query);
    $statement->execute();

    $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    return $resultQuery;
}

// FUNCTION TO PRINT OUT POSTS AND THE SUM OF THEIR VOTES
// SORTING ON LATEST POSTED
function postsShow($pdo)
{
    // $query = "SELECT posts.*, users.*,  FROM posts JOIN users ON posts.user_id=users.id
    // ORDER BY post_id DESC";

    $query2 = "SELECT posts.*, users.*, (SELECT sum(vote_dir) FROM votes
  WHERE posts.post_id=votes.post_id) AS score FROM posts
  JOIN votes ON posts.post_id=votes.post_id
  JOIN users ON posts.user_id=users.id GROUP BY posts.post_id ORDER BY post_id DESC";

    $statement = $pdo->prepare($query2);
    $statement->execute();

    $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    return $resultQuery;
}

// FUNCTION TO PRINT OUT POSTS AND THE SUM OF THEIR VOTES
// SORTING ON HIGHEST RATING
function postsShowTopRated($pdo)
{
    // $query = "SELECT posts.*, users.*,  FROM posts JOIN users ON posts.user_id=users.id
    // ORDER BY post_id DESC";

    $query2 = "SELECT posts.*, users.*, (SELECT sum(vote_dir) FROM votes
  WHERE posts.post_id=votes.post_id) AS score FROM posts
  JOIN votes ON posts.post_id=votes.post_id
  JOIN users ON posts.user_id=users.id GROUP BY posts.post_id ORDER BY score DESC";

    $statement = $pdo->prepare($query2);
    $statement->execute();

    $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    return $resultQuery;
}

// SORTING ON HIGHEST RATING
function randomPosts($pdo)
{
    // $query = "SELECT posts.*, users.*,  FROM posts JOIN users ON posts.user_id=users.id
    // ORDER BY post_id DESC";

    $query2 = "SELECT posts.*, users.* FROM posts
  JOIN users ON posts.user_id=users.id ORDER BY RANDOM()";

    $statement = $pdo->prepare($query2);
    $statement->execute();

    $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    return $resultQuery;
}

// FUNCTION TO GET CURRENT SESSIONS USERS POSTS
function userPosts($pdo)
{
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
function onePost($pdo)
{
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
function comments($pdo)
{
    if (isset($_SESSION['user'])) {
        $id = (int)$_SESSION['user']['id'];
    }

    $post_id = $_GET['id'];
    $query = 'SELECT comment_id, user_id, comment_text, posttime, username, img FROM comments INNER JOIN users ON comments.user_id=users.id WHERE post_id = :post_id ORDER BY comment_id DESC';

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
function otherUser($pdo)
{
    $id = $_GET['id'];
    $query = "SELECT id, name, username, email, biography, img FROM users WHERE id = :id";

    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();


    $resultQuery = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    if (!$resultQuery) {
        die(var_dump("FIXA ETT SNYGGARE MEDDELANDE HÄR"));
    } else {
        return $resultQuery;
    }
}

// FUNCTION TO GET ANOTHER USERS POSTS
function otherUserPosts($pdo)
{
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

// TO GET INFO ON LATEST CREATED POST
function lastNewPost($pdo)
{
    $query = "SELECT post_id FROM posts ORDER BY post_id DESC LIMIT 1";

    $statement = $pdo->prepare($query);
    $statement->execute();

    $resultQuery = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    return $resultQuery;
}
