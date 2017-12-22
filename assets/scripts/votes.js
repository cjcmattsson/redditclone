'use strict';

const voteUp = document.querySelector('.voteUp');
const voteDown = document.querySelector('.voteDown');

const url = "../../app/auth/votes.php";

// FOR VOTEUP
voteUp.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `up=${voteUp.value}&dir=${voteUp.dataset.dir}`
  })
  .then(response => {
    return response.json()
  });
  console.log("hej");
});

// FOR VOTEDOWN
voteDown.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `down=${voteDown.value}&dir=${voteDown.dataset.dir}`
  })
  .then(response => {
    return response.json()
  });
  console.log("då");
});
