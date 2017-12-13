<?php require __DIR__.'/../views/header.php';?>

<div class="row">
  <div class="col-md-6">
  <article>
    <!-- If user hasent chosen an img, a standard image will show -->

    <?php $posts = postsShow($pdo)?>
    <?php foreach ($posts as $post): ?>
      <!-- the actual blog post: title/author/date/content -->
      <h2><a href=""><?php echo $post['title'];?></a></h2>
      <p><i class="fa fa-user"></i> by <a href=""><?php echo $post['username'] ?></a>
      </p>
      <hr>
      <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
      <p><i class="fa fa-user"></i> Check it out: <a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

      <p><i class="fa fa-calendar"></i> Posted on <?php echo $post['posttime'];?></p>
      <hr>
      <br>
    <?php endforeach; ?>
  </article>
  </div>
  </div>

<?php if (isset($_SESSION['user'])): ?>
  <div class="col-sm-8 p-0 pt-4">
  <form action="../app/auth/newPost.php" method="post">
    <h2>New Post</h2>
    <div class="form-group">
      <label for="title">Title<h6>Max: 35 chars</h6></label>
      <input type="text" class="form-control" name="title" maxlength="35">
    </div>
    <div class="form-group">
      <label for="description">Description<h6>Max: 200 chars</h6></label>
      <textarea class="form-control noresize" name="description"rows="3" maxlength="200"></textarea>
    </div>
    <div class="form-group">
      <label for="url">Link/URL</label>
      <input type="url" class="form-control" name="url">
    </div>
    <button type="submit" class="btn btn-primary">Submit Post</button>
  </form>
  </div>
<?php endif; ?>

<?php require __DIR__.'/../views/footer.php'; ?>
