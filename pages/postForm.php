<?php if (isset($_SESSION['user'])): ?>
  <div class="col-sm-6 p-0 pt-4 mx-auto">
  <form action="../app/auth/newPost.php" method="post">
    <h2 class="logo mx-auto text-center mb-3">New Post</h2>
    <hr>
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
    <button type="submit" class="btn general-button btn-block">Submit Post</button>
  </form>
  </div>
<?php endif; ?>
