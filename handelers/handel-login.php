<?php
session_start();
include_once ("../core/functions.php");
include_once ("../core/validations.php");
$errors_login = [];

if (check_request_method("POST") && check_post_input("email")) {
  foreach ($_POST as $key => $value) {
    $$key = sanitize_input($value);
  }

  // Validations 
  // email => required, is_valid_email

  if (required_val($email)) {
    $errors_login[] = "Email Is Required";
  } elseif (email_val($email)) {
    $errors_login[] = "Please Type A Valid Email";
  }

  // Validations 
  // password => required, min:6, max:20

  if (required_val($password)) {
    $errors_login[] = "Password Is Required";
  } elseif (min_val($password, 6)) {
    $errors_login[] = "Password Must Be Greater Than 6 Chars";
  } elseif (max_val($password, 20)) {
    $errors_login[] = "Password Must Be Smaller Than 20 Chars";
  }

  if (empty($errors_login)) {
    $users = convert_csv_to_array("../data/users.csv");
    $user = check_user_found($users, $email, $password);

    if ($user) {
      $_SESSION["auth_login"] = $user;
      redirect("../index.php");
      die;
    } else {
      $errors_login[] = "Invalid Email or Password";
      $_SESSION["errors_login"] = $errors_login;
      redirect("../login.php");
      die;
    }
  } else {
    $_SESSION["errors_login"] = $errors_login;
    redirect("../login.php");
    die;
  }

} else {
  echo "Not Supported Method";
}