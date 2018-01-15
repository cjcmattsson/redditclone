<?php

declare(strict_types=1);
require __DIR__.'../../views/header.php';


?>

<div class="page-padding-top">

<article>
    <h1>Login</h1>

    <form action="../app/auth/login.php" method="post">
        <div class="form-group">
            <label for="email">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Coolkid92" required>
            <small class="form-text text-muted">Enter your email address</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Very secret, uncrackable password goes here</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Login</button>



    </form>

      <small class="form-text text-muted">Not a user yet? <a href="createForm.php">Create Account</a></small>
</article>

</div>

<?php require __DIR__.'../../views/footer.php'; ?>
