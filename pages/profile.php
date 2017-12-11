<?php
require __DIR__.'../../views/header.php';

?>

<article>
    <h1><?php echo $_SESSION['user']['name'];?></h1>
    <p>This is the home page.</p>
</article>

<?php require __DIR__.'../../views/footer.php'; ?>
