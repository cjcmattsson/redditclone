<?php
require __DIR__.'../../views/header.php';

?>

<div class="padding-top-small-page">
  <button class="page-back" onclick="goBack()"><i class="material-icons">backspace</i></button>



<div class="container">
  <div class="row">
    <div class="col-md-6 text-center">
      <article>
        <!-- If user hasent chosen an img, a standard image will show -->

        <?php $userInfos = otherUser($pdo)?>
        <?php foreach ($userInfos as $info): ?>
          <img class="profilePic" src="
          <?php if(isset($info['img'])): ?>
            <?php echo "../images/".$info['img']; ?>
          <?php else: echo "../images/barack.jpg";?>

          <?php endif; ?>" alt="">
          <h1><?php echo $info['name'];?></h1>
          <p><?php echo $info['biography'];?></p>
          <p><?php echo $info['email'];?></p>
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


    <div class="col-md-6 text-center">
      <h2>Activity Feed</h2>
      <div class="activity-feed">
        <?php if (isset($_SESSION['user']) && $_GET['id'] === $_SESSION['user']['id']): ?>
        <?php $posts = otherUserPosts($pdo)?>
        <?php if (count($posts)): ?>
          <?php foreach ($posts as $post): ?>
            <div class="feed-item">
              <div class="date"><?php echo $post['posttime']?></div>
              <div class="text">Post: <a href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="feed-item">
            <div class="text">Write your first post here: <a href="createPost.php">Hello</a></div>
          </div>
        <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </div>
  </div>

  <?php require __DIR__.'../../views/footer.php'; ?>
