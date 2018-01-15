const showPostForm = document.querySelector('.show-hidden');
const showForm = document.querySelector('.show-form');
const exitButton = document.querySelector('.exit-button');

showPostForm.addEventListener('focus', () => {
  showForm.classList.add('show-hidden');
  exitButton.classList.add('show-hidden');
})

exitButton.addEventListener('click', () => {
  showForm.classList.remove('show-hidden');
  exitButton.classList.remove('show-hidden');
})
