<!-- Navigation-section used on all pages -->


  <nav class="navbar navbar-expand-lg fixed-top navbar-light nav-color">
    <a class="navbar-brand text-white logo logo-navbar mr-4 text-shadow" href="/"><?php echo $config['title']; ?></a>
    <button class="navbar-toggler hamburger pb-0" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <i class="material-icons" style="font-size:30px;">menu</i>
    </button>


    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item mr-2">
            <a class="nav-link home text-shadow" href="/index.php">Home</a>
        </li> <!-- /nav-item -->
        <li class="nav-item mr-2">
            <a class="nav-link posts text-shadow" href="/pages/posts.php">Posts</a>
        </li> <!-- /nav-item -->
        <li class="nav-item mr-2">
            <a class="nav-link about text-shadow" href="/pages/about.php">About</a>
        </li><!-- /nav-item -->

        <!-- If user is logged in, show profile-button -->
        <!-- If user is not logged in, show login and create user-buttons -->

        <?php if (isset($_SESSION['user'])): ?>
        <li class="nav-item mr-2">
          <a class="nav-link post-op text-shadow" href="/pages/createPost.php">Create Post</a>
        </li><!-- /nav-item -->
      <?php endif; ?>
      </ul>

      <?php if (!isset($_SESSION['user'])): ?>
        <a class="text-white text-shadow" href="/pages/loginForm.php"><button class="btn btn-light btn-sm loginButton text-white">Login</button></a>
        <a class="text-white text-shadow" href="/pages/createForm.php"><button class="btn btn-light btn-sm text-white">Sign up</button></a>

      <?php else: ?>
        <?php $infos = userInfo($pdo)?>
        <?php foreach ($infos as $info): ?>
          <a href="/pages/profile.php"><button class="btn profile-nav"><img class="navProfilePic"
            src="<?php if (isset($info['img'])): ?>
            <?php echo "../images/".$info['img']; ?>
            <?php else: echo "../images/barack.jpg";?>
          <?php endif; ?>" alt="">
        <?php echo $info['username'];?> &raquo;</button></a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </nav>
