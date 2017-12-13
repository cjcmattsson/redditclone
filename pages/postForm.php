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
