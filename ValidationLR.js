document.getElementById("register-form").addEventListener("submit", function(event) {
  // Get form fields
  var firstName = document.getElementById("reg-firstname").value.trim();
  var lastName = document.getElementById("reg-lastname").value.trim();
  var email = document.getElementById("reg-email").value.trim();
  var password = document.getElementById("regPassword").value.trim();
  const checkbox = document.getElementById("RegTerms").checked;
  var strongPassword = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  

  // Basic validation
  if (firstName === "" || lastName === "") {
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

  if (!strongPassword.test(password)) {
  alert("Password must be at least 8 characters and include letters, numbers, and special characters.");
  event.preventDefault();
  return;
  }
  if (!checkbox) {
    alert("You must agree to the terms before submitting.");
    event.preventDefault();
    return;
  } 
  // If all is good, form will submit
});
