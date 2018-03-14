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

require __DIR__.'/../autoload.php';

// Code for a user to edit ones profile-info and avatar

// CHANGE PROFILE PIC
if (isset($_FILES['img'])) {
    // Giving the uploaded img the username + the extension of the file
    $info = pathinfo($_FILES['img']['name']);
    $ext = $info['extension']; // get the extension of the file
    $username = $_SESSION['user']['username'];
    $newname = $username.'.'.$ext;
    $id = (int)$_SESSION['user']['id'];

    $img = filter_var($newname, FILTER_SANITIZE_STRING);

    $query = 'UPDATE users SET img = :img WHERE id = :id';

    $statement = $pdo->prepare($query);

    $statement->bindParam(':img', $img, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    if ($_FILES['img']['size'] >= 5000000) {
        redirect('../../pages/editImg.php');
    } else {
        if (file_exists(__DIR__.'/../../images/'.$username.'.jpg')) {
            unlink(__DIR__.'/../../images/'.$username.'.jpg');
        }
        if (file_exists(__DIR__.'/../../images/'.$username.'.png')) {
            unlink(__DIR__.'/../../images/'.$username.'.png');
        }
        if (file_exists(__DIR__.'/../../images/'.$username.'.jpeg')) {
            unlink(__DIR__.'/../../images/'.$username.'.jpeg');
        }
        $statement->execute();
        move_uploaded_file($_FILES['img']['tmp_name'], __DIR__.'/../../images/'.$newname);
        redirect('../../pages/profile.php');
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
}

// CHANGE PROFILE INFORMATION
if (isset($_POST['biography'], $_POST['email'])) {

  // setting all variables for whats to be uploaded/updated in the database
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
    $id = (int)$_SESSION['user']['id'];


    $query = 'UPDATE users SET email = :email, biography = :biography WHERE id = :id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();


    redirect('../../pages/profile.php');
};


// CHANGE PASSWORD
if (isset($_POST['password'])) {
    // setting all variables for whats to be uploaded/updated in the database
    $password = filter_var($_POST['password']);
    $id = (int)$_SESSION['user']['id'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = 'UPDATE users SET password = :password WHERE id = :id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    redirect('../../pages/profile.php');
};
