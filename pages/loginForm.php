<?php

declare(strict_types=1);
require __DIR__.'../../views/header.php';


?>

<div class="page-padding-top">

<article class="col-lg-5 col-md-8 py-4 px-4 mx-auto login-form">
    <h1 class="logo mx-auto text-center mb-3 form-header">Enter OpFlip</h1>

    <form action="../app/auth/login.php" method="post">
        <div class="form-group">
            <label for="email">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Coolkid92" required>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Secrets.." required>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-block general-button mb-3">Login</button>



    </form>

      <small class="form-text text-muted">Not a user yet? <a href="createForm.php">Create Account</a></small>
</article>

</div>

<?php require __DIR__.'../../views/footer.php'; ?>
