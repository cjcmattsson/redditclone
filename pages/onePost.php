<?php require __DIR__.'/../views/header.php';

$post = onePost($pdo);

?>

<div class="row">
  <div class="col-md-6">
  <article>
      <h2><?php echo $post['title'];?></h2>
      <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
        <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
        <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
      <?php endif; ?>
      <p><i class="fa fa-user"></i> by <a href=""><?php echo $post['username'] ?></a>
      </p>
      <hr>
      <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
      <p><i class="fa fa-user"></i> Check it out: <a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

      <p><i class="fa fa-calendar"></i> Posted on <?php echo $post['posttime'];?></p>
      <hr>
      <br>

<!-- SETUP CONFURM BUTTON IS USERS WANTS TO DELETE POST -->
<?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
  <!-- ONLY ALLOW THE USER WHO WROTE THE POST TO DELETE THEM.... -->
  <a class="deletePost" href="../app/auth/deletePost.php?id=<?php echo $post['post_id']?>"
    type="button" name="button" onclick="return confirm('Are you sure?')">Delete Post</a>
<?php endif; ?>
  </article>
  </div>
  </div>


<?php require __DIR__.'/../views/footer.php'; ?>
