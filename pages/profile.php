<?php
require __DIR__.'../../views/header.php';

?>

<article>
  <!-- If user hasent chosen an img, a standard image will show -->

    <?php $infos = userInfo($pdo)?>
    <?php foreach ($infos as $info): ?>
      <img class="profilePic" src=" <?php if(isset($info['img'])): ?>
          <?php echo "../images/".$info['img']; ?>
          <?php else: echo "../images/barack.jpg"; ?>
          <?php endif; ?>" alt="">
        <h1><?php echo $info['name'];?></h1>
        <p><?php echo $info['biography'];?></p>
        <p><?php echo $info['email'];?></p>
  <?php endforeach; ?>
    <form action="editProfile.php" method="post">
      <button type="submit" class="btn btn-primary">Edit Profile</button>
      </form>
</article>

<?php require __DIR__.'../../views/footer.php'; ?>
