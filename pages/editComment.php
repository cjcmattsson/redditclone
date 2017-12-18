<?php
require __DIR__.'../../views/header.php';

$comment_id = $_GET['id'];
$query = "SELECT * FROM comments WHERE comment_id = :comment_id";

$statement = $pdo->prepare($query);
$statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
$statement->execute();

$comment = $statement->fetch(PDO::FETCH_ASSOC);

?>

<?php if (isset($_SESSION['user'])): ?>
  <div class="col-sm-8 p-0 pt-4">
    <!-- SENDING POST_ID through $_GET see editPostLogic.php?id=.... -->
    <form action="../app/auth/editCommentLogic.php?id=<?php echo $post['post_id']?>" method="post">
      <div class="form-group">
        <label for="description"><h4>Comment</h4><h6>Max: 50 chars</h6></label>
        <textarea class="form-control noresize" name="comment" rows="2" maxlength="50"><?php echo $comment['comment_text'] ;?> </textarea>
      </div>
      <button type="submit" class="btn btn-primary">Edit Comment</button>
    </form>
  </div>
<?php endif; ?>


<?php require __DIR__.'/../views/footer.php'; ?>
