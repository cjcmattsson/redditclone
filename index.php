<?php require __DIR__.'/views/header.php'; ?>

<h1 class="text-center mb-3">Welcome to RedditClone</h1>


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
                <h1>Join the community</h1>
                <p>Create a profile to start sharing your awesome links and engage with the rest of the community</p>
                <p><a class="btn" href="pages/createForm.php" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item second-slide">
            <div class="container">
              <div class="carousel-caption">
                <h2>Experience a vast diversity of content</h2>
                <p>Enjoy all the different content shared by the community</p>
                <p><a class="btn" href="pages/posts.php" role="button">Browse posts</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item third-slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h2>What are we all about?</h2>
                <p>We believe in the free expression of thought - and funny GIF's..</p>
                <p><a class="btn" href="pages/about.php" role="button">About us</a></p>
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
    <h2 class="text-center mb-5">Featured Profiles</h2>
    <?php $users = randomUsers($pdo); ?>
    <div class="row">
      <?php foreach ($users as $user): ?>
      <div class="col-lg-4 mb-3 rand-user">
        <a href="pages/user.php?id=<?php echo $user['id']?>" role="button">
          <img class="rounded-circle" src="<?php if(isset($user['img'])): ?>
        <?php echo "../images/".$user['img']; ?>
        <?php else: echo "../images/barack.jpg";?>
      <?php endif; ?>" alt="Generic placeholder image" width="140" height="140"></a>
        <h3> <?php echo $user['username'] ?> </h3>
        <p><a class="btn btn-secondary profile" href="pages/user.php?id=<?php echo $user['id']?>" role="button">Visit User &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

    <?php endforeach; ?>
    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
<h2 class="text-center mb-5">Featured Posts</h2>

    <?php $post = randomPosts($pdo)?>

    <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
    <div class="row featurette center-block">
      <div class="col-md-6">
        <h2 class="featurette-heading"> <?php echo $post[0]['title'] ?></h2>
        <a class="lead" href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post[0]['url'] ?></a>
        <p class="lead"><?php echo $post[0]['description'] ?></p>
        <br>
        <p><?php echo $post[0]['posttime'] ?></p>
      </div>
      <div class="col-md-6">
        <img class="featurette-image img-fluid mx-auto rand-post-img" src="<?php if(isset($post[0]['img'])): ?>
      <?php echo "../images/".$post[0]['img']; ?>
      <?php else: echo "../images/barack.jpg";?>
    <?php endif; ?>" alt="Generic placeholder image">
      </div>
    </div>
    <hr class="featurette-divider">


    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading"> <?php echo $post[1]['title'] ?></h2>
        <a class="lead" href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post[1]['url'] ?></a>
        <p class="lead"><?php echo $post[1]['description'] ?></p>
        <br>
        <p><?php echo $post[1]['posttime'] ?></p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto rand-post-img" src="<?php if(isset($post[1]['img'])): ?>
      <?php echo "../images/".$post[1]['img']; ?>
      <?php else: echo "../images/barack.jpg";?>
    <?php endif; ?>" alt="Generic placeholder image">
      </div>
    </div>
    <hr class="featurette-divider">



    <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading"> <?php echo $post[2]['title'] ?></h2>
        <a class="lead" href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post[2]['url'] ?></a>
        <p class="lead"><?php echo $post[2]['description'] ?></p>
        <br>
        <p><?php echo $post[2]['posttime'] ?></p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto rand-post-img" src="<?php if(isset($post[2]['img'])): ?>
      <?php echo "../images/".$post[2]['img']; ?>
      <?php else: echo "../images/barack.jpg";?>
    <?php endif; ?>" alt="Generic placeholder image">
      </div>
    </div>
    <hr class="featurette-divider">



    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading"> <?php echo $post[3]['title'] ?></h2>
        <a class="lead" href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post[3]['url'] ?></a>
        <p class="lead"><?php echo $post[3]['description'] ?></p>
        <br>
        <p><?php echo $post[3]['posttime'] ?></p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto rand-post-img" src="<?php if(isset($post[3]['img'])): ?>
      <?php echo "../images/".$post[3]['img']; ?>
      <?php else: echo "../images/barack.jpg";?>
    <?php endif; ?>" alt="Generic placeholder image">
      </div>
    </div>

<?php require __DIR__.'/views/footer.php'; ?>
