'use strict';

function validateLogin(login) {
  var regex = /^[A-Za-z0-9]{1,16}$/;
  if (regex.test(login)) {
    $('#username_error').html('')
    return true;
  } else {
    $('#username_error').html('Invalid login. Please use Latin letters and digits')
    return false;
  }
}

function validateEmail(email) {
  var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (regex.test(email) == true) {
    $('#email_error').html('');
    return true;
  } else {
    $('#email_error').html('Invalid email');
    return false;
  }
}

function validatePassword(pass) {
  var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  
  if (regex.test(pass)) {
    $('#password_error').html('');
    return true;
  } else {
    $('#password_error').html('Invalid password. Please enter a valid password (at least 6 characters with both upper and lower case letters and a digit).');
    return false;
  }
}

$("#registerForm").submit(function (e) {
  e.preventDefault();
  let validate = true;
  let pass = $('#password').val();
  let pass2 = $('#password2').val();
  if (!validateLogin($('#username').val())) {
    validate = false;
  }
  
  if (!validateEmail($('#email').val())) {
    validate = false;
  }
  
  if (!validatePassword($('#password').val())) {
    validate = false;
  }
  
  if (pass !== pass2 || pass === '' || pass2 === '') {
    validate = false;
  }
  
  if (validate) {
    this.submit();
  } else {
    alert('Check your form information');
  }
});
