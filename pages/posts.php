<?php require __DIR__.'/../views/header.php';?>

<div class="page-padding-top">

  <div class="post-type-buttons">
    <a class="btn btn-lg btn-block mt-0 latestPosts hovering" href="#" role="button"><span class="logo">Recent <i class="material-icons">new_releases</i></span></a>
    <a class="btn btn-lg btn-block mt-0 topRatedPosts hovering" href="#" role="button"><span class="logo">Trending <i class="material-icons">trending_up</i></span></a>
  </div>

  <br>
  <div class="latest">
    <h1 class="text-center"><span class="logo">Recent Posts<i class="material-icons">new_releases</i></span></h1>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="col-sm-6 p-0 mx-auto">
          <form class="post-page-form" action="../app/auth/newPost.php" method="post" required>
            <div class="form-group">
              <input type="text" class="form-control show-hidden" name="title" placeholder="Got somethin on ya mind?" maxlength="35" required>
            </div>
            <div class="show-form">
              <div class="form-group">
                <textarea class="form-control noresize" name="description"rows="3" placeholder="Description" maxlength="200" required></textarea>
              </div>
              <div class="form-group">
                <input type="url" class="form-control" name="url" placeholder="Link/URL">
              </div>
              <div class="buttons-post">
                <button type="submit" class="btn btn-primary mb-3">Submit Post</button>
                <button type="button" class="btn mb-3 exit-button">Cancel</button>
              </div>
            </div>

          </form>
        </div>
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

                <h3><a class="post-text" href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></h3>
                <p class="time-posts-name"><i class="fa fa-user"></i><a href="user.php?id=<?php echo $post['user_id'] ?>"><?php echo $post['username'] ?></a>
                  <small class="time-posts-name"> - <i class="fa fa-calendar"></i><?php echo $post['posttime'];?></small>
                  <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
                    <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
                    <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
                  <?php endif; ?>

                </p>
                <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
                <p><i class="fa fa-user"></i><a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

                <a href="onePost.php?id=<?php echo $post['post_id'] ?>"> <button class="engage" type="button" name="button">Engage/Comment</button></a>
                <!-- VOTE SECTION!  -->


                <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
              </div>
              <div class="voteScore">
                <?php if (isset($_SESSION['user'])): ?>
                  <button class="voteUp" type="button" name="up" data-dir="1" value="<?php echo $post['post_id']?>"><i class="material-icons">arrow_upward</i></button>
                  <p class="sum"> <?php echo " ".$post['score']?> </p>
                  <button class="voteDown" type="button" name="down" data-dir="-1" value="<?php echo $post['post_id']?>"><i class="material-icons">arrow_downward</i></button>
                <?php endif; ?>
                <?php if($i == 10) break; ?>

                <!-- SUMMAN AV VOTESEN SKA HIT -->
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="topRated">
  <h1 class="text-center"><span class="logo">Trending Posts<i class="material-icons">trending_up</i></span></h1>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="col-sm-6 p-0 mx-auto">
        <form class="post-page-form-2" action="../app/auth/newPost.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control show-hidden-2" name="title" placeholder="Got somethin on ya mind?" maxlength="35">
          </div>
          <div class="show-form-2">
            <div class="form-group">
              <textarea class="form-control noresize" name="description"rows="3" placeholder="Description" maxlength="200"></textarea>
            </div>
            <div class="form-group">
              <input type="url" class="form-control" name="url" placeholder="Link/URL">
            </div>
            <div class="buttons-post">
              <button type="submit" class="btn btn-primary mb-3">Submit Post</button>
              <button type="button" class="btn mb-3 exit-button-2">Cancel</button>
            </div>
          </div>

        </form>
      </div>
      <div class="all-posts-container">


        <?php $posts = postsShowTopRated($pdo)?>


        <?php $i= 0; ?>
        <!-- THIS IS TO LOOP THROUGH THE ARRAY -->
        <?php foreach ($posts as $post): ?>
          <?php $i++; ?>

          <article class="feed-posts">


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

              <h3><a class="post-text" href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></h3>

              <p class="time-posts-name"><i class="fa fa-user"></i><a href="user.php?id=<?php echo $post['user_id'] ?>"><?php echo $post['username'] ?></a>
                <small class="time-posts-name"> - <i class="fa fa-calendar"></i><?php echo $post['posttime'];?></small>
                <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
                  <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
                  <small class="form-text text-muted"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post</a></small>
                <?php endif; ?>
              </p>
              <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
              <p><i class="fa fa-user"></i><a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>
              <a href="onePost.php?id=<?php echo $post['post_id'] ?>"> <button class="engage" type="button">Engage/Comment</button></a>

              <!-- VOTE SECTION!  -->


              <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
            </div>
            <div class="voteScore">
              <?php if (isset($_SESSION['user'])): ?>
                <button class="voteUp" type="button" name="up" data-dir="1" value="<?php echo $post['post_id']?>"><i class="material-icons">arrow_upward</i></button>
                <p class="sum"> <?php echo " ".$post['score']?> </p>
                <button class="voteDown" type="button" name="down" data-dir="-1" value="<?php echo $post['post_id']?>"><i class="material-icons">arrow_downward</i></button>
              <?php endif; ?>
              <?php if($i == 10) break; ?>

              <!-- SUMMAN AV VOTESEN SKA HIT -->
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</div>

<?php require __DIR__.'/../views/footer.php'; ?>
