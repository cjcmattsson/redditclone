// RECENT
const showPostForm = document.querySelector('.show-hidden');
const showForm = document.querySelector('.show-form');
const exitButton = document.querySelector('.exit-button');

showPostForm.addEventListener('focus', () => {
  showPostForm.placeholder = "Title";
  showForm.classList.add('show-hidden');
  exitButton.classList.add('show-hidden');
})

exitButton.addEventListener('click', () => {
  showPostForm.placeholder = "Got somethin on ya mind?";
  showForm.classList.remove('show-hidden');
  exitButton.classList.remove('show-hidden');
})

// TRENDING
const showPostForm2 = document.querySelector('.show-hidden-2');
const showForm2 = document.querySelector('.show-form-2');
const exitButton2 = document.querySelector('.exit-button-2');

showPostForm2.addEventListener('focus', () => {
  showPostForm2.placeholder = "Title";
  showForm2.classList.add('show-hidden');
  exitButton2.classList.add('show-hidden');
})

exitButton2.addEventListener('click', () => {
  showPostForm2.placeholder = "Got somethin on ya mind?";
  showForm2.classList.remove('show-hidden');
  exitButton2.classList.remove('show-hidden');
})
