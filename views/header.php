<?php

declare(strict_types=1);

require __DIR__.'/../app/autoload.php';

// Header part of all pages
// Contains all styling

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $config['title']; ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/assets/styles/activity-feed.css">
    <link rel="stylesheet" href="/assets/styles/fonts.css">
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>
<body>
    <?php require __DIR__.'/navigation.php'; ?>

    <div class="container">
