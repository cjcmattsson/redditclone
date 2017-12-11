<?php

declare(strict_types=1);

require __DIR__.'../../views/header.php';

?>

<article>
    <h1>Create Account</h1>

    <form action="../app/auth/create.php" method="post">
        <div class="form-group">
            <label for="email">First Name</label>
            <input class="form-control" type="text" name="first-name" placeholder="Kurt" required>
            <label for="email">Last Name</label>
            <input class="form-control" type="text" name="last-name" placeholder="Wallander" required>

        </div><!-- /form-group -->

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="kurt@wallander.com" required>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="**********" required>
            <label for="password">Repeat Password</label>
            <input class="form-control" type="password" name="password" placeholder="**********" required>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Create Account</button>
    </form>

</article>

<?php require __DIR__.'../../views/footer.php'; ?>
