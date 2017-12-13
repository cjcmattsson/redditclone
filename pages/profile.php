<?php
require __DIR__.'../../views/header.php';

?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <article>
        <!-- If user hasent chosen an img, a standard image will show -->

        <?php $infos = userInfo($pdo)?>
        <?php foreach ($infos as $info): ?>
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
      <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Settings
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="editImg.php">Change Avatar</a>
    <a class="dropdown-item" href="editProfile.php">Edit Profile Info</a>
    <a class="dropdown-item" href="editPassword.php">Change Password</a>
  </div>
</div>
    </div>


<div class="col-md-6">
  <h2>Activity Feed</h2>
  <div class="activity-feed">
  <?php $posts = userPosts($pdo)?>
  <?php if (count($posts)): ?>
  <?php foreach ($posts as $post): ?>
      <div class="feed-item">
        <div class="date"><?php echo $post['posttime']?></div>
        <div class="text">Post: <a href="single-need.php"><?php echo $post['title'];?></a></div>
      </div>
    <?php endforeach; ?>
    <?php else:?>
      <div class="feed-item">
        <div class="text">Write your first post here: <a href="./posts.php">Hello</a></div>
      </div>
<?php endif; ?>
</div>
</div>
</div>

<?php require __DIR__.'../../views/footer.php'; ?>
