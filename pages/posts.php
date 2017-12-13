<?php require __DIR__.'/../views/header.php';?>

<div class="row">
  <div class="col-md-6">
  <article>
    <!-- If user hasent chosen an img, a standard image will show -->

    <?php $posts = postsShow($pdo)?>
    <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
    <?php $i= 0; ?>
    <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
    <?php foreach ($posts as $post): ?>
      <?php $i++; ?>

      <h2><a href=""><?php echo $post['title'];?></a></h2>
      <!-- Link to where the creator of the post can edit the post if session is set -->
      <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
        <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
        <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
      <?php endif; ?>
      <!-- Actual post content -->
      <p><i class="fa fa-user"></i> by <a href=""><?php echo $post['username'] ?></a>
      </p>
      <hr>
      <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
      <p><i class="fa fa-user"></i> Check it out: <a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

      <p><i class="fa fa-calendar"></i> Posted on <?php echo $post['posttime'];?></p>
      <hr>
      <br>
      <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
      <?php if($i == 5) break; ?>
    <?php endforeach; ?>
  </article>
  </div>
  </div>

<?php require 'postForm.php'; ?>


<?php require __DIR__.'/../views/footer.php'; ?>
