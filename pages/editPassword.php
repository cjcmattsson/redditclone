<?php require __DIR__.'../../views/header.php';?>

<div class="padding-top-small-page">

<div class="col-md-6 mx-auto text-center">

  <form action="../app/auth/editUser.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="password"><h2>Change Password</h2></label>
      <input class="form-control password" type="text" maxlength="30" name="password" placeholder="...keep it safe...keep it hidden" required>
    </div><!-- /form-group -->


    <button type="submit" class="btn btn-block general-button">Save Changes</button>
  </form>
  <br>
  <form action="profile.php" method="post">
    <button type="submit" class="btn btn-block exit-button">Cancel</button>
  </form>
</div>


</div>
<?php require __DIR__.'../../views/footer.php'; ?>
