<?php
require __DIR__.'../../views/header.php';

?>

<div class="padding-top-small-page">
  <button class="page-back" onclick="goBack()"><i class="material-icons">backspace</i></button>



<div class="container">
  <div class="row">
    <div class="col-md-6">
      <article class="userInfo text-center">
        <!-- If user hasent chosen an img, a standard image will show -->

        <?php $infos = userInfo($pdo)?>
        <?php foreach ($infos as $info): ?>
          <img class="profilePic" src="
          <?php if(isset($info['img'])): ?>
            <?php echo "../images/".$info['img']; ?>
            <?php else: echo "../images/barack.jpg";?>

          <?php endif; ?>" alt="">
          <h1><?php echo $info['username'];?></h1>
          <h4><?php echo $info['name'];?></h4>
          <br>
          <p><?php echo $info['biography'];?></p>
          <p><?php echo $info['email'];?></p>
        <?php endforeach; ?>
      </article>
      <div class="dropdown show text-center">
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
    </div>


<div class="col-md-6 userInfo">
  <h2>Activity Feed</h2>
  <div class="activity-feed">
  <?php $posts = userPosts($pdo)?>
  <?php if (count($posts)): ?>
  <?php foreach ($posts as $post): ?>
      <div class="feed-item">
        <div class="date"><?php echo $post['posttime']?></div>
        <div class="text">Post: <a href="onePost.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'];?></a></div>
      </div>
    <?php endforeach; ?>
    <?php else:?>
      <div class="feed-item">
        <div class="text">Write your first post here: <a href="createPost.php">Hello</a></div>
      </div>
<?php endif; ?>
</div>
<a class="text-white text-center" href="/app/auth/logout.php"><button class="btn btn-primary text-center">Logout</button></a>
</div>
</div>
</div>

<?php require __DIR__.'../../views/footer.php'; ?>
