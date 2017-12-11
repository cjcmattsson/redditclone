<?php

declare(strict_types=1);

require __DIR__.'/../functions.php';


if (isset($_POST['email'])) {
  redirect('/');
};

require __DIR__.'/../../views/header.php';

?>

<article>
    <h1>Login</h1>

    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="kurt@wallander.com" required>
            <small class="form-text text-muted">Enter your email address</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Very secret, uncrackable password goes here</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</article>

<?php require __DIR__.'/../../views/footer.php'; ?>
