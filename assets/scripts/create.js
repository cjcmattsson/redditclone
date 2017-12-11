'use strict';

console.log('Hello World');

// Makes it possible for th user wants to see the password
// they are typing at "Create Account"-page
function showPassword() {
  let password = document.querySelector('.password');
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}


  const togglePassword = document.querySelector('.togglePassword');
  togglePassword.addEventListener('click', showPassword);
