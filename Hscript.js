window.onload = function () 
{
  // Home page script
  const navbarToggle = document.querySelector('.navbar-toggle');
  const navbarMenu = document.querySelector('.navbar-menu');
  if (navbarToggle && navbarMenu) {
    navbarToggle.addEventListener('click', () => {
      navbarToggle.classList.toggle('active');
      navbarMenu.classList.toggle('active');
    });
  }

  // Login/register popup logic
  const wrapper = document.querySelector('.wrapper');
  const loginLink = document.querySelector('.login-link');
  const registerLink = document.querySelector('.register-link');
  const btnPopup = document.querySelector('.btnLogin-popup');
  const iconClose = document.querySelector('.icon-close');

  if (registerLink && wrapper) {
    registerLink.addEventListener('click', () => {
      wrapper.classList.add('active');
    });
  }

  if (loginLink && wrapper) {
    loginLink.addEventListener('click', () => {
      wrapper.classList.remove('active');
    });
  }

  if (btnPopup && wrapper) {
    btnPopup.addEventListener('click', () => {
      wrapper.classList.add('active-popup');
    });
  }

  if (iconClose && wrapper) {
    iconClose.addEventListener('click', () => {
      wrapper.classList.remove('active-popup');
    });
  }

};

//contact validation

document.getElementById("register-form").addEventListener("submit", function(event) 
{
  // Get form fields
  var firstName = document.getElementById("con-firstname").value.trim();
  var lastName = document.getElementById("con-lastname").value.trim();
  var email = document.getElementById("con-email").value.trim();
  var mobile = document.getElementById("con-no").value.trim();
  var message = document.getElementById("con-msg").value.trim();

  // Basic validation
  if (firstName === "" || lastName === "" || email === "" || mobile === "" || message === "") {
    alert("Please fill in all fields.");
    event.preventDefault(); // stop form from submitting
    return;
  }

  // Email validation
  var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!email.match(emailPattern)) {
    alert("Please enter a valid email address.");
    event.preventDefault();
    return;
  }

  // Mobile number validation (Sri Lankan format as example)
  var phonePattern = /^\+94\d{9}$/;
  if (!mobile.match(phonePattern)) {
    alert("Please enter a valid mobile number in format +94XXXXXXXXX.");
    event.preventDefault();
    return;
  }
  alert("Massage send!");

    // If all is good, form will submit
});
