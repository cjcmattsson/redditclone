<?php
require __DIR__.'../../views/header.php';

?>

<article>
  <img class="profilePic" src=" <?php if(isset($_SESSION['user']['img'])): ?>
            <?php echo $_SESSION['user']['img']; ?>
          <?php else: echo "../images/barack.jpg"; ?>
        <?php endif; ?>" alt="">

  <h1><?php echo "Edit profile";?></h1>
    <form action="../app/auth/edit.php" method="post">
        <div class="form-group">
          <label for="biography">Biography</label>
          <textarea class="form-control" type="text" maxlength="200" name="biography" placeholder="<?php echo $_SESSION['user']['biography']; ?>" required></textarea>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="<?php echo $_SESSION['user']['email']?>" required>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control password" type="text" name="password" placeholder="...keep it safe...keep it hidden" required>
            <input class="togglePassword" type="checkbox"> Show Password
        </div><!-- /form-group -->


        <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
        <form action="profile.php" method="post">
          <button type="submit" class="btn btn-primary">Cancel</button>
          </form>

</article>

<?php require __DIR__.'../../views/footer.php'; ?>
