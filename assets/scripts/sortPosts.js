const showLatestPosts = document.querySelector('.latestPosts');
const showTopRatedPosts = document.querySelector('.topRatedPosts');

const latest = document.querySelector('.latest');
const topRated = document.querySelector('.topRated');
const body = document.querySelector('body');

showLatestPosts.addEventListener('click', () => {
  latest.classList.remove('hide');
  topRated.classList.remove('show');
  topRated.classList.add('hide');
  latest.classList.add('show');
});

showTopRatedPosts.addEventListener('click', () => {
  topRated.classList.remove('hide');
  latest.classList.remove('show');
  latest.classList.add('hide');
  topRated.classList.add('show');
});
