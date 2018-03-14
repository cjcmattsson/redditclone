<?php
require __DIR__.'../../views/header.php';

?>

<div class="padding-top-small-page">



  <div class="container profile-container col-lg-10 col-md-12">
    <div class="row">
      <div class="col-md-6 text-center">
        <article class="userInfo text-center">
          <!-- If user hasent chosen an img, a standard image will show -->

          <?php $userInfos = otherUser($pdo)?>
          <?php foreach ($userInfos as $info): ?>
            <img class="profilePic" src="
            <?php if (isset($info['img'])): ?>
              <?php echo "../images/".$info['img']; ?>
            <?php else: echo "../images/barack.jpg";?>

            <?php endif; ?>" alt="">
            <div class="white-profile">

              <h1><?php echo $info['name'];?></h1>
              <h4><?php echo $info['username'];?></h4>
              <p><?php echo $info['biography'];?></p>
              <p><?php echo $info['email'];?></p>
            </div>
          <?php endforeach; ?>
        </article>
        <!-- IF USER PRESSES HIS OWN NAME IN POSTS, HE CAN ACCES THE SAME AS WHEN PRESSING "PROFILE" -->
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['username']): ?>
          <?php if ($_GET['id'] === $_SESSION['user']['id'] && isset($_SESSION['user'])): ?>

            <div class="dropdown show">
              <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="editImg.php">Change Avatar</a>
                <a class="dropdown-item" href="editProfile.php">Edit Profile Info</a>
                <a class="dropdown-item" href="editPassword.php">Change Password</a>
              </div>
            </div>
            <br>
            <a class="text-white" href="/app/auth/logout.php"><button class="btn btn-primary">Logout</button></a>
          <?php endif; ?>
        <?php endif; ?>
      </div>


      <div class="col-md-6 userInfo activity-feed">
        <h2>Activity Feed</h2>
        <div class="activity-feed">
          <?php $posts = otherUserPosts($pdo)?>
          <?php if (count($posts)): ?>
            <?php foreach ($posts as $post): ?>
              <div class="feed-item">
                <div class="date"><?php echo $post['posttime']?></div>
                <div class="text">Post: <a href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <?php if (isset($_SESSION['user']) && $_GET['id'] === $_SESSION['user']['id']): ?>
              <div class="feed-item">
                <div class="text">Write your first post here: <a href="createPost.php">Hello</a></div>
              </div>
            <?php else: ?>
              <h4>Nothing post yet</h4>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?php require __DIR__.'../../views/footer.php'; ?>
