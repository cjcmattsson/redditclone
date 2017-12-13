<?php require __DIR__.'../../views/header.php';?>

<form action="../app/auth/editUser.php" method="post" enctype="multipart/form-data">
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

<?php require __DIR__.'../../views/footer.php'; ?>
