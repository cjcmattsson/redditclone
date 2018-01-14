const home = document.querySelector('.home');
const posts = document.querySelector('.posts');
const about = document.querySelector('.about');
const postOp = document.querySelector('.post-op');


if(window.location.href.indexOf("index.php") > -1) {
  home.classList.add('navActive');
} else if (window.location.href.indexOf("posts.php") > -1) {
  posts.classList.add('navActive');
} else if (window.location.href.indexOf("about.php") > -1) {
  about.classList.add('navActive');
} else if (window.location.href.indexOf("createPost.php") > -1) {
  postOp.classList.add('navActive');
}
