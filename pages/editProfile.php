<?php
require __DIR__.'../../views/header.php';

$id = (int)$_SESSION['user']['id'];
$query = "SELECT * FROM users WHERE id = :id";

$statement = $pdo->prepare($query);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();


$user = $statement->fetch(PDO::FETCH_ASSOC);

?>
<div class="padding-top-small-page">
  <article class="col-md-6 mx-auto text-center">
    <form action="../app/auth/editUser.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="biography"><h2>Edit Biography</h2></label>
        <textarea class="form-control noresize" type="text"
        name="biography" maxlength="200"><?php echo $user['biography']?></textarea>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="email"><h2>Edit Email</h2></label>
        <input class="form-control" type="email" maxlength="45" name="email" value="<?php echo $user['email']?>" required>
      </div><!-- /form-group -->


      <button type="submit" class="btn btn-block general-button">Save Changes</button>
    </form>
    <br>
    <form action="profile.php" method="post">
      <button type="submit" class="btn btn-block exit-button">Cancel</button>
    </form>

  </article>

</div>
<?php require __DIR__.'../../views/footer.php'; ?>
