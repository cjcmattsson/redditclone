<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['email'], $_POST['password'])) {
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $password = filter_var($_POST['password']);
  $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = 'UPDATE users (name, username, email, password, biography)
            VALUES (:name, :username, :email, :password, :biography)';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

  $statement->execute();

  redirect('../../pages/loginForm.php');

};
