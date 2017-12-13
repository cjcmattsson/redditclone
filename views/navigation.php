<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="/"><?php echo $config['title']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li><!-- /nav-item -->

        <li class="nav-item">
            <a class="nav-link" href="/pages/posts.php">Posts</a>
        </li><!-- /nav-item -->

        <li class="nav-item">
            <a class="nav-link" href="/pages/about.php">About</a>
        </li><!-- /nav-item -->

        <?php if (isset($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="/app/auth/logout.php"><?php echo "Logout"; ?></a>
        </li><!-- /nav-item -->
        <li class="nav-item">
          <a class="nav-link" href="/pages/profile.php">Profile</a>
        </li><!-- /nav-item -->
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/pages/loginForm.php"><?php echo "Login"; ?></a>
        </li><!-- /nav-item -->
      <?php endif; ?>
    </ul><!-- /navbar-nav -->
  </nav><!-- /navbar -->
