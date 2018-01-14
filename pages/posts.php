<?php require __DIR__.'/../views/header.php';?>

<div class="page-padding-top">

<div class="post-type-buttons">
<a class="btn btn-lg btn-block mt-0 latestPosts hovering" href="#" role="button"><span class="logo">Latest</span></a>
<a class="btn btn-lg btn-block mt-0 topRatedPosts hovering" href="#" role="button"><span class="logo">Trending</span></a>
</div>

<br>
<div class="latest">
  <h1 class="text-center">Latest Posts</h1>
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

      <article class="feed-posts" onclick="location.href='onePost.php?id=<?php echo $post['post_id'] ?>';">

        <!-- Link to where the creator of the post can edit the post if session is set -->

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

        <h2><a class="post-text" href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></h2>
        <small><i class="fa fa-calendar"></i><?php echo $post['posttime'];?></small>
        <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
          <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
          <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
        <?php endif; ?>
        <p><i class="fa fa-user">Posted by: </i><a href="user.php?id=<?php echo $post['user_id'] ?>"><?php echo $post['username'] ?></a>

        </p>
        <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
        <p><i class="fa fa-user"></i> Link: <a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

        <a href="onePost.php?id=<?php echo $post['post_id'] ?>"> <button type="button" name="button">Engage/Comment</button></a>
        <br>
        <!-- VOTE SECTION!  -->

        <div class="voteScore">
        <?php if (isset($_SESSION['user'])): ?>
          <button class="voteUp" type="button" name="up" data-dir="1" value="<?php echo $post['post_id']?>">UP</button>
          <button class="voteDown" type="button" name="down" data-dir="-1" value="<?php echo $post['post_id']?>">DOWN</button>
        <?php endif; ?>

        <!-- SUMMAN AV VOTESEN SKA HIT -->
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
</div>
</div>



    <div class="topRated">
      <h1 class="text-center">Trending Posts</h1>
      <hr>
    <div class="row">
      <div class="col-md-12">

        <div class="all-posts-container">


    <?php $posts = postsShowTopRated($pdo)?>

    <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
    <?php $i= 0; ?>
    <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
    <?php foreach ($posts as $post): ?>
      <?php $i++; ?>

      <article class="feed-posts" onclick="location.href='onePost.php?id=<?php echo $post['post_id'] ?>';">

        <!-- Link to where the creator of the post can edit the post if session is set -->

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

        <h2><a class="post-text" href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></h2>
        <small><i class="fa fa-calendar"></i><?php echo $post['posttime'];?></small>
        <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
          <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
          <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
        <?php endif; ?>
        <p><i class="fa fa-user">Posted by: </i><a href="user.php?id=<?php echo $post['user_id'] ?>"><?php echo $post['username'] ?></a>

        </p>
        <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
        <p><i class="fa fa-user"></i> Link: <a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

        <a href="onePost.php?id=<?php echo $post['post_id'] ?>"> <button type="button" name="button">Engage/Comment</button></a>
        <br>
        <!-- VOTE SECTION!  -->

        <div class="voteScore">
        <?php if (isset($_SESSION['user'])): ?>
          <button class="voteUp" type="button" name="up" data-dir="1" value="<?php echo $post['post_id']?>">UP</button>
          <button class="voteDown" type="button" name="down" data-dir="-1" value="<?php echo $post['post_id']?>">DOWN</button>
        <?php endif; ?>

        <!-- SUMMAN AV VOTESEN SKA HIT -->
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
</div>



</div>
<?php require 'postForm.php'; ?>

<?php require __DIR__.'/../views/footer.php'; ?>
