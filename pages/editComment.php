<?php
require __DIR__.'../../views/header.php';

$comment_id = $_GET['id'];
$query = "SELECT * FROM comments WHERE comment_id = :comment_id";

$statement = $pdo->prepare($query);
$statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
$statement->execute();

$comment = $statement->fetch(PDO::FETCH_ASSOC);

$post_id = $_POST['post_id'];

?>
<div class="page-padding-top">

  <?php if (isset($_SESSION['user'])): ?>
    <div class="col-sm-8 p-0 pt-4">
      <!-- SENDING POST_ID through $_GET see editPostLogic.php?id=.... -->
      <form action="../app/auth/editCommentLogic.php?id=<?php echo $comment['comment_id']?>" method="post">
        <div class="form-group">
          <label for="description"><h4>Change comment</h4><h6>Max: 50 chars</h6></label>
          <textarea class="form-control noresize" name="comment" rows="2" maxlength="50"><?php echo $comment['comment_text'] ;?> </textarea>
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        </div>
        <button type="submit" class="btn general-button">Edit Comment</button>
      </form>
<br>
      <form action="../../pages/onePost.php?id=<?php echo $post_id?>" method="post">
        <button type="submit" class="btn exit-button">Cancel</button>
      </form>
    </div>
  <?php endif; ?>

</div>

<?php require __DIR__.'/../views/footer.php'; ?>
