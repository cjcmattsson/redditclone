<?php
require __DIR__.'../../views/header.php';

$post_id = $_GET['id'];
$query = "SELECT * FROM posts WHERE post_id = :post_id";

$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();

$post = $statement->fetch(PDO::FETCH_ASSOC);

?>

<div class="padding-top-small-page">

  <?php if (isset($_SESSION['user'])): ?>
    <div class="col-sm-6 p-0 mx-auto">
      <!-- SENDING POST_ID through $_GET see editPostLogic.php?id=.... -->
      <form action="../app/auth/editPostLogic.php?id=<?php echo $post_id?>" method="post">
        <h2 class="text-center">Edit Post</h2>
        <div class="form-group">
          <label for="title">Change Title<h6>Max: 35 chars</h6></label>
          <input type="text" class="form-control" name="title" maxlength="35" value="<?php echo $post['title'] ;?> ">
        </div>
        <div class="form-group">
          <label for="description">Change Description<h6>Max: 200 chars</h6></label>
          <textarea class="form-control noresize" name="description"rows="3" maxlength="200"><?php echo $post['description'] ;?></textarea>
        </div>
        <div class="form-group">
          <label for="url">Change Link/URL</label>
          <input type="url" class="form-control" name="url" value="<?php echo $post['url'] ;?> ">
        </div>
        <button type="submit" class="btn btn-block general-button">Save Changes</button>
      </form>
      <br>
      <form action="onePost.php?id=<?php echo $post_id?>" method="post">
        <button type="submit" class="btn btn-block exit-button">Cancel</button>
      </form>
    </div>
  <?php endif; ?>



</div>

<?php require __DIR__.'/../views/footer.php'; ?>
