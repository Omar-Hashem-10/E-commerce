<?php
session_start();
include_once ("../core/functions.php");
include_once ("../core/validations.php");
$errors_register = [];
include_once ("../data/users_id.php");

if (check_request_method("POST") && check_post_input("name")) {
  foreach ($_POST as $key => $value) {
    $$key = sanitize_input($value);
  }

  // Validations 
  // name => required, min:3, max:25

  if (required_val($name)) {
    $errors_register[] = "Name Is Required";
  } elseif (min_val($name, 3)) {
    $errors_register[] = "Name Must Be Greater Than 3 Chars";
  } elseif (max_val($name, 25)) {
    $errors_register[] = "Name Must Be Smaller Than 25 Chars";
  }

  // Validations 
  // email => required, is_valid_email


  if (required_val($email)) {
    $errors_register[] = "Email Is Required";
  } elseif (email_val($email)) {
    $errors_register[] = "Please Type A Valid Email";
  }

  // Validations 
  // password => required, min:3, max:25

  if (required_val($password)) {
    $errors_register[] = "Password Is Required";
  } elseif (min_val($password, 6)) {
    $errors_register[] = "Password Must Be Greater Than 6 Chars";
  } elseif (max_val($password, 20)) {
    $errors_register[] = "Password Must Be Smaller Than 20 Chars";
  }

  $user_id++;
  file_put_contents("../data/users_id.php", "<?php\n\$user_id = $user_id;\n");

  if (empty($errors_register)) {
    $user_file = fopen("../data/users.csv", "a+");
    $data_of_user_rgister = [$user_id, $name, $email, sha1($password)];
    fputcsv($user_file, $data_of_user_rgister);
    $_SESSION["auth_register"] = $data_of_user_rgister;
    redirect("../index.php");
    die;
  } else {
    $_SESSION["errors_register"] = $errors_register;
    redirect("../register.php");
    die;
  }

} else {
  echo "Not Supported Method";
}