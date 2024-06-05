// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the form elements
var loginForm = document.getElementById("loginForm");
var registerForm = document.getElementById("registerForm");
var showRegisterForm = document.getElementById("showRegisterForm");
var showLoginForm = document.getElementById("showLoginForm");

// When the user clicks the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Show the register form and hide the login form
showRegisterForm.onclick = function () {
  loginForm.style.display = "none";
  registerForm.style.display = "block";
};

// Show the login form and hide the register form
showLoginForm.onclick = function () {
  registerForm.style.display = "none";
  loginForm.style.display = "block";
};
