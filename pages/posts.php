<?php require __DIR__.'/../views/header.php';?>

<div class="page-padding-top">

<a class="btn btn-lg btn-block latestPosts hovering" href="#" role="button"><span class="logo">Latest</span></a>
<a class="btn btn-lg btn-block topRatedPosts hovering" href="#" role="button"><span class="logo">Trending</span></a>

<br>
<div class="latest">
  <h1>Latest Posts</h1>
  <hr>
<div class="row">
  <div class="col-md-12">
    <!-- If user hasent chosen an img, a standard image will show -->
<div class="all-posts-container">


    <?php $posts = postsShow($pdo)?>

    <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
    <?php $i= 0; ?>
    <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
    <?php foreach ($posts as $post): ?>
      <?php $i++; ?>

      <article class="feed-posts">

        <!-- Link to where the creator of the post can edit the post if session is set -->
        <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
          <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
          <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
        <?php endif; ?>
        <!-- Actual post content -->
        <div class="pic-post">

        <a href="user.php?id=<?php echo $post['user_id'] ?>">
        <img class="profilePicPosts" src="
        <?php if(isset($post['img'])): ?>
          <?php echo "../images/".$post['img']; ?>
        <?php else: echo "../images/barack.jpg";?>

        <?php endif; ?>" alt="">
        </a>
      </div>
      <div class="content-post">

        <h2><a href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></h2>
        <p><i class="fa fa-user">Posted by: </i><a href="user.php?id=<?php echo $post['user_id'] ?>"><?php echo $post['username'] ?></a>

        </p>
        <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
        <p><i class="fa fa-user"></i> Link: <a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

        <p><i class="fa fa-calendar"></i><?php echo $post['posttime'];?></p>
        <a href="onePost.php?id=<?php echo $post['post_id'] ?>"> <button type="button" name="button">Engage/Comment</button></a>
        <br>
        <!-- VOTE SECTION!  -->

        <?php if (isset($_SESSION['user'])): ?>
          <button class="voteUp" type="button" name="up" data-dir="1" value="<?php echo $post['post_id']?>">UP</button>
          <button class="voteDown" type="button" name="down" data-dir="-1" value="<?php echo $post['post_id']?>">DOWN</button>
        <?php endif; ?>

        <!-- SUMMAN AV VOTESEN SKA HIT -->
        <div class="voteScore">
          <p> Score: </p> <p class="sum"> <?php echo " ".$post['score']?> </p>
        </div>

        <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
        <?php if($i == 5) break; ?>
      </div>
      </article>
    <?php endforeach; ?>
  </div>
</div>
</div>



    <!-- If user hasent chosen an img, a standard image will show -->
    <div class="topRated">
      <h1>Trending Posts</h1>
      <hr>
    <div class="row">
      <div class="col-md-12">

    <?php $posts = postsShowTopRated($pdo)?>

    <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
    <?php $i= 0; ?>
    <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
    <?php foreach ($posts as $post): ?>
      <?php $i++; ?>

      <article class="feed-posts">
        <h2><a href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></h2>
        <!-- Link to where the creator of the post can edit the post if session is set -->
        <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
          <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
          <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
        <?php endif; ?>
        <!-- Actual post content -->
        <a href="user.php?id=<?php echo $post['user_id'] ?>">
        <img class="profilePicPosts" src="
        <?php if(isset($post['img'])): ?>
          <?php echo "../images/".$post['img']; ?>
        <?php else: echo "../images/barack.jpg";?>

        <?php endif; ?>" alt="">
        </a>
        <p><i class="fa fa-user"></i> by <a href="user.php?id=<?php echo $post['user_id'] ?>"><?php echo $post['username'] ?></a>
        </p>
        <hr>
        <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
        <p><i class="fa fa-user"></i> Check it out: <a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

        <p><i class="fa fa-calendar"></i> Posted on <?php echo $post['posttime'];?></p>
                <a href="onePost.php?id=<?php echo $post['post_id'] ?>"> <button type="button" name="button">Read more & Comment</button></a>
                <br>

        <!-- VOTE SECTION!  -->

        <?php if (isset($_SESSION['user'])): ?>
          <button class="voteUp" type="button" name="up" data-dir="1" value="<?php echo $post['post_id']?>">UP</button>
          <button class="voteDown" type="button" name="down" data-dir="-1" value="<?php echo $post['post_id']?>">DOWN</button>
        <?php endif; ?>

        <!-- SUMMAN AV VOTESEN SKA HIT -->
        <div class="voteScore">
          <p> Score: </p> <p class="sum"> <?php echo " ".$post['score']?> </p>
        </div>


        <hr>
        <br>
        <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
        <?php if($i == 5) break; ?>
      </article>
    <?php endforeach; ?>
  </div>
</div>
</div>

</div>


<?php require 'postForm.php'; ?>

</div>
<?php require __DIR__.'/../views/footer.php'; ?>
