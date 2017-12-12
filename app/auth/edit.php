<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['email'], $_POST['password'])) {
  // Giving the uploaded img the username + the extension of the file
  $info = pathinfo($_FILES['img']['name']);
  $ext = $info['extension']; // get the extension of the file
  $newname = $_SESSION['user']['username'].'.'.$ext;

  // setting all variables for whats to be uploaded/updated in the database
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $password = filter_var($_POST['password']);
  $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
  $img = filter_var($_SESSION['user']['username'].'.'.$ext, FILTER_SANITIZE_STRING);
  $id = (int)$_SESSION['user']['id'];


  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = 'UPDATE users SET email = :email, password = :password,
            biography = :biography, img = :img WHERE id = :id';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
  $statement->bindParam(':img', $img, PDO::PARAM_STR);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);

  $statement->execute();

  if (isset($_FILES['img'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], __DIR__.'/../../images/'.$newname);
  }

// SE NEDAN FÖR SIZE-SIX PÅ BILDEN
//   if (isset($_FILES['img'])) {
//     $avatar = $_FILES['img'];
//     if ($avatar['size'] >= 2097152) {
//         echo 'The uploaded file exceeded the file size limit.';
//     } else {
//         move_uploaded_file($avatar['tmp_name'], __DIR__.'/avatar.png');
//     }
// }

  redirect('../../pages/profile.php');

};
