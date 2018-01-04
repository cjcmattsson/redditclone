'use strict';
const usernameField = document.querySelector('.usernameField');
const alreadyExists = document.querySelector('.alreadyExists');


let usernameSearch = () => {
  let searchUser = usernameField.value;
  // RODDA PHPH FIL MED SELECT SÖK SATS
  fetch(`../../app/auth/searchUser.php?username=${searchUser}`)
  .then(response => {
    return response.json()
  })
  .then(response => {
    console.log(response);
    if (response.length && searchUser.toLowerCase() === response[0].username.toLowerCase()) {
      console.log("if");
      alreadyExists.textContent = "That name is taken!"
    } else {
      console.log("else");
      alreadyExists.textContent = ""
    }
  })
}
usernameField.addEventListener('keyup', usernameSearch);