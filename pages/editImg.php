<?php require __DIR__.'../../views/header.php';?>

<form action="../app/auth/editUser.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="img">Change profile picture</label>
    <input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="img">
  </div><!-- /form-group -->
  <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
  <br>
  <form action="profile.php" method="post">
    <button type="submit" class="btn btn-primary">Cancel</button>
    </form>

<?php require __DIR__.'../../views/footer.php'; ?>
