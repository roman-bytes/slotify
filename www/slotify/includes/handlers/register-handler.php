<?php
function sanitizeFormPassword($passwordText) {
  return strip_tags($passwordText);
}

function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

function sanitizeFormString($stringText) {
  $stringText = strip_tags($stringText);
  $stringText = str_replace(" ", "", $stringText);
  $stringText = ucfirst(strtolower($stringText));
  return $stringText;
}

// Check if register button was pressed
if (isset($_POST['registerButton'])) {
  $username = sanitizeFormUsername($_POST['username']);
  $firstName = sanitizeFormString($_POST['firstName']);
  $lastName = sanitizeFormString($_POST['lastName']);
  $email = sanitizeFormString($_POST['email']);
  $confirmEmail = sanitizeFormString($_POST['confirmEmail']);
  $password = sanitizeFormPassword($_POST['registerPassword']);
  $confirmPass = sanitizeFormPassword($_POST['registerPassword2']);
  $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPass);
  if ($wasSuccessful) {
    $_SESSION['userLoggedIn'] = $username;
    header('Location: index.php');
  }
}
?>