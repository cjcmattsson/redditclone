<?php require __DIR__.'../../views/header.php';?>

<div class="page-padding-top">

<form action="../app/auth/editUser.php" method="post" enctype="multipart/form-data">
  <button class="page-back" onclick="goBack()"><i class="material-icons">backspace</i></button>
  <div class="form-group">
    <label for="password">Change Password</label>
    <input class="form-control password" type="text" name="password" placeholder="...keep it safe...keep it hidden" required>
  </div><!-- /form-group -->


  <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
<br>
<form action="profile.php" method="post">
  <button type="submit" class="btn btn-primary">Cancel</button>
</form>


</div>
<?php require __DIR__.'../../views/footer.php'; ?>
