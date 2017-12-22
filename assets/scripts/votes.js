'use strict';

const voteUp = document.querySelectorAll('.voteUp');
const voteDown = document.querySelectorAll('.voteDown');
const sum = document.querySelector('.sum');


const url = "../../app/auth/votes.php";
const sumVotes = "../../app/auth/getSumVotes.php";



// FOR PRINTING THE SUM OF THE VOTES LIVE

fetch(sumVotes, {
  method: "POST",
  headers: {"Content-Type": "application/x-www-form-urlencoded"},
  credentials: "include",
  body: `post_id=${voteUp.value}`
})
.then(response => {
  return response.json()
})
.then(votes => {
  sum.innerHTML = 
})
;

// FOR VOTEUP BUTTONS
Array.from(voteUp).forEach(up => {
  up.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `up=${up.value}&dir=${up.dataset.dir}`
  })
  .then(response => {
    return response.json()
  });
  console.log("hej");
})
});

// FOR VOTEDOWN BUTTONS
Array.from(voteDown).forEach(down => {
down.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `down=${down.value}&dir=${down.dataset.dir}`
  })
  .then(response => {
    return response.json()
  });
  console.log("då");
})
});
