<?php 
  class Account {
    private $con;
    private $errorArray;

    public function __construct($con) {
      $this->con = $con;
      $this->errorArray = array();
    }

    public function register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPass) {
      $this->validateUsername($username);
      $this->validateFirstName($firstName);
      $this->validateLastName($lastName);
      $this->validateEmails($email, $confirmEmail);
      $this->validatePasswords($password, $confirmPass);

      if (empty($this->errorArray)) {
        // Insert in DB
        return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
      } else {
        return false;
      }
    }

    public function login($username, $password) {
      $encryptedPass = md5($password);
      $userQuery = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$encryptedPass'");
    
      if (mysqli_num_rows($userQuery) == 1) {
        return true;
      } else {
        array_push($this->errorArray, Constants::$loginError);
        return false;
      }
    }

    public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($username, $firstName, $lastName, $email, $password) {
      $encryptedPass = md5($password);
      $profilePic = "assets/images/profile-pic/head_emerald.png";
      $date = date("Y-m-d");
      $result = mysqli_query($this->con, "INSERT INTO users VALUES (null, '$username', '$firstName', '$lastName', '$email', '$encryptedPass', '$date', '$profilePic')");
      return $result;
    }

    private function validateUsername($username) {
      if (strlen($username) > 25 || strlen($username) < 5) {
        array_push($this->errorArray, Constants::$usernameLength);
        return;
      }

      $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
      if (mysqli_num_rows($checkUsernameQuery) != 0) {
        array_push($this->errorArray, Constants::$usernameTaken);
        return;
      }
    }
    
    private function validateFirstName($firstName) {
      if (strlen($firstName) > 25 || strlen($firstName) < 2) {
        array_push($this->errorArray, Constants::$firstNameLength);
        return;
      }
    }
    
    private function validateLastName($lastName) {
      if (strlen($lastName) > 25 || strlen($lastName) < 2) {
        array_push($this->errorArray, Constants::$lastNameLength);
        return;
      }
    }
    
    private function validateEmails($em, $em2) {
      if ($em != $em2) {
        array_push($this->errorArray, Constants::$emailDoesNotMatch);
        return;
      }

      if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        array_push($this->errorArray, Constants::$emailFormat);
        return;
      }

      //TODO: Check that email is not already used.
      $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
      if (mysqli_num_rows($checkEmailQuery) != 0) {
        array_push($this->errorArray, Constants::$emailTaken);
        return;
      }
    }
    
    private function validatePasswords($pw, $pw2) {
      if ($pw != $pw2) {
        array_push($this->errorArray, Constants::$passwordDoesNotMatch);
        return;
      }

      if (preg_match('/[^A-Za-z0-9]/', $pw)) {
        array_push($this->errorArray, Constants::$passwordFormat);
        return;
      }

      if (strlen($pw) > 30 || strlen($pw) < 5) {
        array_push($this->errorArray, COnstants::$passwordLength);
        return;
      }
    }
  }
?>