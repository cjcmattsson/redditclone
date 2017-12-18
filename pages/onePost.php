<?php require __DIR__.'/../views/header.php';

$post = onePost($pdo);
$comments = comments($pdo);

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
      <form action="../app/auth/comment.php?id=<?php echo $post['post_id']?>" method="post">
        <div class="form-group">
          <label for="description"><h4>Comment</h4><h6>Max: 50 chars</h6></label>
          <textarea class="form-control noresize" name="comment" rows="2" maxlength="50"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
      </form>
      <br>

      <?php foreach ($comments as $comment): ?>

        <p><i class="fa fa-user"></i><a href=""><?php echo $comment['username'] ?></a>
        <!-- COMMENT TEXT -->
        <p class="lead"><i class="fa fa-user"></i><?php echo $comment['comment_text'] ?></p>
        <!-- FOR FUTURE USER OF EDIT POST -->
        <?php if (isset($_SESSION['user']) && $comment['username'] === $_SESSION['user']['username']): ?>
          <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
          <form class="" action="editComment.php?id=<?php echo $comment['comment_id']?>" method="post">
              <input type="hidden" name="post_id" value="<?php echo $_GET['id']?> ">
              <button type="submit" name="button">Edit comment</button>
          </form>

          <form class="" action="../app/auth/deleteComment.php?id=<?php echo $comment['comment_id']?>" method="post">
              <input type="hidden" name="post_id" value="<?php echo $_GET['id']?> ">
              <button type="submit" name="button" onclick="return confirm('You really want to delete this?')">DELETE comment</button>
          </form>
        <?php endif; ?>
        <small class="form-text text-muted"> Posted on <?php echo $comment['posttime'];?></small>
        <hr>
        <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
      <?php endforeach; ?>

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
