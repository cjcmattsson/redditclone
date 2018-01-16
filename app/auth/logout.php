<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Code to unset session when user presses the logout button

unset($_SESSION['user']);
redirect('/');
