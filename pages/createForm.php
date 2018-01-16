<?php

declare(strict_types=1);

require __DIR__.'../../views/header.php';

?>
<div class="padding-top-small-page">

  <article class="col-lg-6 col-md-8 py-4 px-4 mb-5 mx-auto create-form">
    <h1 class="logo form-header text-center">We're glad to have you!</h1>

    <form action="../app/auth/create.php" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" maxlength="30" placeholder="Kurt Wallander" required>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="username">Username</label> <label class="alreadyExists text-danger small"></label>
        <input class="form-control usernameField" type="text" maxlength="12" name="username" placeholder="Coolkid92" required>

      </div><!-- /form-group -->

      <div class="form-group">
        <label for="biography">Biography</label>
        <textarea class="form-control noresize" type="text" maxlength="200" name="biography" placeholder="I'm a graphic designer that loves to..." required></textarea>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" maxlength="45" name="email" placeholder="kurt@wallander.com" required>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control password" type="password" maxlength="30" name="password" placeholder="**********" required>
        <input class="togglePassword" type="checkbox"> Show Password
      </div><!-- /form-group -->


      <button type="submit" class="btn btn-block general-button create-account-button">Create Account</button>
    </form>

  </article>


</div>

<?php require __DIR__.'../../views/footer.php'; ?>
