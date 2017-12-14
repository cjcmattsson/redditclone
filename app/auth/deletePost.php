<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$query = 'DELETE FROM posts WHERE post_id=1';
redirect('/');
