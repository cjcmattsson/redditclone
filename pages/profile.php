<?php
require __DIR__.'../../views/header.php';

?>

<article>
  <!-- If user hasent chosen an img, a standard image will show -->
    <img class="profilePic" src=" <?php if(isset($_SESSION['user']['img'])): ?>
              <?php echo $_SESSION['user']['img']; ?>
            <?php else: echo "../images/barack.jpg"; ?>
          <?php endif; ?>" alt="">

    <h1><?php echo $_SESSION['user']['name'];?></h1>
    <p><?php echo $_SESSION['user']['biography'];?></p>
    <p><?php echo $_SESSION['user']['email'];?></p>
    <form action="editProfile.php" method="post">
      <button type="submit" class="btn btn-primary">Edit Profile</button>
      </form>
</article>

<?php require __DIR__.'../../views/footer.php'; ?>
