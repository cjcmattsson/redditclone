<?php require __DIR__.'/../views/header.php';

$post = onePost($pdo);
$comments = comments($pdo);

?>
<div class="padding-top-small-page">
  <div class="row">


    <article class="col-md-6 text-center mb-4">

      <!-- Link to where the creator of the post can edit the post if session is set -->

      <!-- Actual post content -->
      <div class="">

        <a href="user.php?id=<?php echo $post['user_id'] ?>">
          <img class="profilePicPosts" src="
          <?php if(isset($post['img'])): ?>
            <?php echo "../images/".$post['img']; ?>
          <?php else: echo "../images/barack.jpg";?>

          <?php endif; ?>" alt="">
        </a>
      </div>
      <div class="">

        <h2><?php echo $post['title'];?></h2>
        <p class="time-posts-name"><i class="fa fa-user"></i><a href="user.php?id=<?php echo $post['user_id'] ?>"><?php echo $post['username'] ?></a>
          <small class="time-posts-name"> - <i class="fa fa-calendar"></i><?php echo $post['posttime'];?></small>
          <?php if (isset($_SESSION['user']) && $post['username'] === $_SESSION['user']['username']): ?>
            <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
            <small class="form-text text-muted d-inline"><a href="editPost.php?id=<?php echo $post['post_id'] ?>">Edit Post - </a></small>
            <small class="form-text text-muted d-inline"><a class="deletePost" href="../app/auth/deletePost.php?id=<?php echo $post['post_id']?>"
              name="button" onclick="return confirm('Are you sure?')">Delete Post</a></small>
            <?php endif; ?>

          </p>
          <p class="lead"><i class="fa fa-user"></i><?php echo $post['description'] ?></p>
          <p><i class="fa fa-user"></i><a href="<?php echo $post['url'] ?>" target="_blank"><?php echo $post['url'] ?></a></p>

        </div>
        <br>
        <div>
          <?php if (isset($_SESSION['user'])): ?>
            <form action="../app/auth/comment.php?id=<?php echo $post['post_id']?>" method="post">
              <div class="form-group">
                <textarea class="form-control noresize" name="comment" rows="2" maxlength="50" required placeholder="State your oppinion!"
                oninvalid="this.setCustomValidity('You forgot to leave a mean comment!')" oninput="setCustomValidity('')"></textarea>

              </div>
              <button type="submit" class="btn btn-block general-button add">Submit Comment</button>
            </form>
          <?php endif; ?>
        </div>

      </article>

      <div class="col-md-6">
        <h4 class="text-center">Comments</h4>
        <hr>
        <?php if (count($comments)): ?>
          <?php foreach ($comments as $comment): ?>
            <div class="post-comment">

              <div class="comment-profpic">

                <a href="user.php?id=<?php echo $comment['user_id'] ?>">
                  <img class="profilePicPostsComment" src="
                  <?php if(isset($comment['img'])): ?>
                    <?php echo "../images/".$comment['img']; ?>
                  <?php else: echo "../images/barack.jpg";?>

                  <?php endif; ?>" alt="">
                </a>
              </div>

              <div class="white">


                <!-- COMMENT TEXT -->
                <p class="lead"><a href="user.php?id=<?php echo $comment['user_id'] ?>"><?php echo $comment['username'] ?></a>: <?php echo $comment['comment_text'] ?></p>
                <!-- FOR FUTURE USER OF EDIT POST -->
                <?php if (isset($_SESSION['user']) && $comment['username'] === $_SESSION['user']['username']): ?>
                  <!-- SENDING POST_ID through $_GET see editPost.php?id=.... -->
                  <form class="d-inline" action="editComment.php?id=<?php echo $comment['comment_id']?>" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $_GET['id']?> ">
                    <small class="form-text text-muted"><button type="submit" name="button">Edit comment</button></small>
                  </form>

                  <form class="" action="../app/auth/deleteComment.php?id=<?php echo $comment['comment_id']?>" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $_GET['id']?> ">
                    <small class="form-text text-muted"><button type="submit" name="button" onclick="return confirm('You really want to delete this?')">DELETE comment</button></small>
                  </form>
                <?php endif; ?>
                <small class="form-text text-muted"> Posted on <?php echo $comment['posttime'];?></small>
              </div>

            </div>

            <!-- THIS IS TO ONLY SHOW THE 5 LATEST -->
          <?php endforeach; ?>
        <?php else:?>
          <div class="feed-item">
            <div class="text-center">Seems like nobody cares... yet</div>
          </div>
        <?php endif; ?>

      </div>

    </div>
  </div>




  <?php require __DIR__.'/../views/footer.php'; ?>
