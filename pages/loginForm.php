<?php

declare(strict_types=1);
require __DIR__.'../../views/header.php';
if (isset($_SESSION['user'])) {
  redirect('/');
};


?>

<article>
    <h1>Login</h1>

    <form action="../app/auth/login.php" method="post">
        <div class="form-group">
            <label for="email">Username</label>
            <input class="form-control" type="text" name="username" placeholder="kurt@wallander.com" required>
            <small class="form-text text-muted">Enter your email address</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Very secret, uncrackable password goes here</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Login</button>



    </form>

    <form action="createForm.php" method="post">
      <small class="form-text text-muted">Not a user yet?</small>
      <button type="submit" class="btn btn-primary">Create Account</button>
      </form>
</article>

<?php require __DIR__.'../../views/footer.php'; ?>
