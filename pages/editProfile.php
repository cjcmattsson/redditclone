<?php
require __DIR__.'../../views/header.php';



?>

<article>
<form action="../app/auth/edit.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="img">Change profile picture</label>
            <input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="img">
        </div><!-- /form-group -->

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
        </div><!-- /form-group -->


        <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
        <br>
        <form action="profile.php" method="post">
          <button type="submit" class="btn btn-primary">Cancel</button>
          </form>

</article>

<?php require __DIR__.'../../views/footer.php'; ?>
