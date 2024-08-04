<?php
session_start();
include_once ("../core/functions.php");
include_once ("../core/validations.php");
$errors_checkout = [];
$all_data = [];


if (check_request_method("POST") && check_post_input("name")) {
  foreach ($_POST as $key => $value) {
    $$key = sanitize_input($value);
  }

  // Validations 
  // Governorate => required

  if (required_val($governorate)) {
    $errors_checkout[] = "Governorate Is Required";
  }

  // Validations 
  // name => required, min:3, max:25

  if (required_val($name)) {
    $errors_checkout[] = "Name Is Required";
  } elseif (min_val($name, 3)) {
    $errors_checkout[] = "Name Must Be Greater Than 3 Chars";
  } elseif (max_val($name, 25)) {
    $errors_checkout[] = "Name Must Be Smaller Than 25 Chars";
  }

  // Validations 
  // mobile number => required, min:11, max:11

  if (required_val($mobile)) {
    $errors_checkout[] = "Mobile Number Is Required";
  } elseif (check_num_pass($mobile)) {
    $errors_checkout[] = "Mobile Number Must Equal 11 Chars";
  }

  // Validations 
  // street name => required

  if (required_val($street_name)) {
    $errors_checkout[] = "street_name Is Required";
  }

  if (empty($errors_checkout)) {
    $data_order_of_user = [$governorate, $name, $mobile, $street_name];
    $_SESSION["auth_checkout"] = $data_order_of_user;
    $data_of_product = $_SESSION["auth_data_name_of_order"];
    $all_data = array_merge($data_order_of_user, $data_of_product);
    save_data_to_json($all_data, "../data/orders-data.json");
    redirect("../checkout.php");
    die;
  } else {
    $_SESSION["errors_checkout"] = $errors_checkout;
    redirect("../checkout.php");
    die;
  }

} else {
  echo "Not Supported Method";
}



