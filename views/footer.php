<hr class="featurette-divider">
<!-- FOOTER -->
<footer class="container">
  <p><a href="#">Back to top</a></p>
  <p class="pb-3">&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>
</div><!-- /container -->
<?php if (stripos($_SERVER['REQUEST_URI'], 'createForm.php')): ?>
  <script src="/assets/scripts/create.js"></script>
  <script src="/assets/scripts/usernameSearch.js"></script>
<?php endif; ?>
<?php if (stripos($_SERVER['REQUEST_URI'], 'posts.php')): ?>
  <script src="/assets/scripts/votes.js"></script>
  <script src="/assets/scripts/sortPosts.js"></script>
<?php endif; ?>
<script src="/assets/scripts/navBarActive.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
