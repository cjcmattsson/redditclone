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
    </div>
    <!-- <div class="col-*-*"></div>

  <div class="row">
    <div class="col-*-*"></div>
    <div class="col-*-*"></div>
    <div class="col-*-*"></div>
  </div>
  <div class="row">
    ...
  </div>
</div> -->



<div class="col-md-6">
<h2>Activity Feed</h2>
<div class="activity-feed">
  <div class="feed-item">
    <div class="date">Sep 25</div>
    <div class="text">Responded to need <a href="single-need.php">“Volunteer opportunity”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 24</div>
    <div class="text">Added an interest “Volunteer Activities”</div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 23</div>
    <div class="text">Joined the group <a href="single-group.php">“Boardsmanship Forum”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 21</div>
    <div class="text">Responded to need <a href="single-need.php">“In-Kind Opportunity”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 18</div>
    <div class="text">Created need <a href="single-need.php">“Volunteer Opportunity”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 17</div>
    <div class="text">Attending the event <a href="single-event.php">“Some New Event”</a></div>
  </div>
</div>
</div>
</div>

<?php require __DIR__.'../../views/footer.php'; ?>
