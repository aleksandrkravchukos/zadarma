'use strict';

function validateLogin(login) {
  $('#username_error').val();
  var errors = [];
  var valid = false;
  e.preventDefault();
  var regex = /^[A-Za-z0-9]+$/;
  if (login.length > 16) {
    $('#username_error').html('Login should be no more than 16 characters.');
  } else if (!regex.test(login)) {
    $('#username_error').html('Login should only contain Latin letters and numbers.');
  } else {
    valid = true;
  }
  
  return [valid, errors];
}

function validateName(name) {
  var regex = /^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/;
  if (regex.test(name) == true) {
    return true;
  } else {
    return false;
  }
}

function validatePhone(phone) {
  var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
  if (regex.test(phone) == true) {
    return true;
  } else {
    return false;
  }
}

function validateEmail(value) {
  var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (regex.test(value) == true) {
    return true;
  } else {
    return false;
  }
}
