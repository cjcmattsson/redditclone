<?php require __DIR__.'/views/header.php'; ?>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active first-slide">
      <div class="container">
        <div class="carousel-caption text-left">
          <h2>Join the <span class="logo">OpFlip</span> community</h2>
          <p>Start your journey towards changing the stupid peoples opinions - TODAY</p>
          <p><a class="btn profile" href="pages/createForm.php" role="button">Sign up to <span class="logo">OpFlip</span></a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item second-slide">
      <div class="container">
        <div class="carousel-caption">
          <h2>Experience the vast <span class="logo">OpFlip</span> content</h2>
          <p>Enjoy all the different content shared by the community</p>
          <p><a class="btn profile" href="pages/posts.php" role="button">Browse posts</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item third-slide">
      <div class="container">
        <div class="carousel-caption text-right">
          <h2>What are <span class="logo">OpFlip</span> all about?</h2>
          <p>We believe in your opinions. So should the world</p>
          <p><a class="btn profile" href="pages/about.php" role="button">About us</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<hr class="featurette-divider">

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <!-- Three columns of text below the carousel -->

  <h1 class="text-center mb-3 opflippers"><span class="logo">Featured Users</span></h1>
  <hr class="featurette-divider">
  <?php $users = randomUsers($pdo); ?>
  <div class="row">
    <?php foreach ($users as $user): ?>
      <div class="col-lg-4 mb-3 rand-user">
        <a href="pages/user.php?id=<?php echo $user['id']?>" role="button">
          <img class="rounded-circle feat-prof mb-3" src="<?php if(isset($user['img'])): ?>
            <?php echo "../images/".$user['img']; ?>
          <?php else: echo "../images/barack.jpg";?>
          <?php endif; ?>" alt="Generic placeholder image"></a>
          <p><a class="btn btn-secondary profile" href="pages/user.php?id=<?php echo $user['id']?>" role="button">@ <?php echo $user['username'] ?></a></p>
        </div><!-- /.col-lg-4 -->

      <?php endforeach; ?>
    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <h1 class="text-center mb-3 opflippers"><span class="logo">Featured Posts</span></h1>
    <hr class="featurette-divider">
    <?php $post = randomPosts($pdo)?>

    <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
    <div class="row featurette center-block all-posts-landing">
        <div class="col-md-6">
          <div class="col-md-12 post-landing">
            <img class="featurette-image img-fluid rand-post-img" src="<?php if(isset($post[0]['img'])): ?>
              <?php echo "../images/".$post[0]['img']; ?>
            <?php else: echo "../images/barack.jpg";?>
            <?php endif; ?>" alt="Generic placeholder image">
            <h2 class="featurette-heading" onclick="location.href='pages/onePost.php?id=<?php echo $post[0]['post_id'] ?>';"> <?php echo $post[0]['title'] ?></h2>
            <p class="lead"><?php echo $post[0]['description'] ?></p>
            <a class="lead" href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post[0]['url'] ?></a>
            <small>Posted: <?php echo $post[0]['posttime'] ?></small>
            <a href="pages/onePost.php?id=<?php echo $post[0]['post_id'] ?>"> <button class="engage" type="button" name="button">Engage/Comment</button></a>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-md-12 post-landing">
            <img class="featurette-image img-fluid rand-post-img" src="<?php if(isset($post[1]['img'])): ?>
              <?php echo "../images/".$post[1]['img']; ?>
            <?php else: echo "../images/barack.jpg";?>
            <?php endif; ?>" alt="Generic placeholder image">
            <h2 class="featurette-heading" onclick="location.href='pages/onePost.php?id=<?php echo $post[1]['post_id'] ?>';"> <?php echo $post[1]['title'] ?></h2>
            <p class="lead"><?php echo $post[1]['description'] ?></p>
            <a class="lead" href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post[1]['url'] ?></a>
            <small>Posted: <?php echo $post[1]['posttime'] ?></small>
            <a href="pages/onePost.php?id=<?php echo $post[1]['post_id'] ?>"> <button class="engage" type="button" name="button">Engage/Comment</button></a>
          </div>
        </div>
    </div>


    <?php require __DIR__.'/views/footer.php'; ?>
