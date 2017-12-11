<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'])) {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $password = filter_var($_POST['password']);
  $email = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = 'INSERT INTO users (name, username, email, password)
            VALUES (:name, :username, :email, :password)';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':name', $name, PDO::PARAM_STR);
  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

  $statement->execute();

  redirect('/');
  // $characters = $statement->fetchAll(PDO::FETCH_ASSOC);

};
