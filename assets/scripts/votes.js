// Code to regarding the vote-functions.
// Makes the user able to see result of their vote straight away


const voteUp = document.querySelectorAll('.voteUp');
const voteDown = document.querySelectorAll('.voteDown');
const sum = document.querySelector('.sum');

const url = "../../app/auth/votes.php";
const sumVotes = "../../app/auth/getSumVotes.php";



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
  })
});

// FOR PRINTING THE SUM OF THE VOTES LIVE

// UPVOTE
Array.from(voteUp).forEach(up => {
  up.addEventListener('click', () => {
    setTimeout(function () {
    fetch(sumVotes, {
      method: "POST",
      headers: {"Content-Type": "application/x-www-form-urlencoded"},
      credentials: "include",
      body: `post_id=${up.value}`
    })
    .then(response => {
      return response.json()
    })
    .then(voteSum => {
      const singleSum = up.parentElement.querySelectorAll('.sum');
      Array.from(singleSum).forEach(oneSum => {
      oneSum.textContent = `${voteSum.score}`;
      oneSum.classList.add('green');
      oneSum.classList.remove('red');
    })
  })
}, 100);
});
});

// DOWNVOTE
Array.from(voteDown).forEach(down => {
  down.addEventListener('click', () => {
    setTimeout(function () {
    fetch(sumVotes, {
      method: "POST",
      headers: {"Content-Type": "application/x-www-form-urlencoded"},
      credentials: "include",
      body: `post_id=${down.value}`
    })
    .then(response => {
      return response.json()
    })
    .then(voteSum => {
      const singleSum = down.parentElement.querySelectorAll('.sum');
      Array.from(singleSum).forEach(oneSum => {
      oneSum.textContent = `${voteSum.score}`;
      oneSum.classList.add('red');
      oneSum.classList.remove('green');
    })
  })
}, 100);
});
});
