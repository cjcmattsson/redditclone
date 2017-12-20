'use strict';

const voteUp = document.querySelector('.voteUp');
const voteDown = document.querySelector('.voteDown');
const url = '../vote.php';

function addVoteUp() {
      fetch(url, {
        method: "POST",
        body: `up=${voteUp.value}`,
        headers: {"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"}

      })
        .then(response => {
        return response.json()
      })
        .then(json => {
          // Now we can now use the JSON as a normal object.
          console.log(parseInt(json));
        });
}

function addVoteDown() {
      fetch(url, {
        method: "POST",
        body: `up=${voteDown.value}`,
        headers: {"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"}

      })
        .then(response => response.json())
        .then(json => {
          // Now we can now use the JSON as a normal object.
          console.log(json);
        });
}


voteUp.addEventListener('click', addVoteUp);

voteDown.addEventListener('click', addVoteDown);
