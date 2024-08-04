<?php


// Check if the input is empty
function required_val($input)
{
  if (empty($input)) {
    return true;
  }
  return false;
}


// Check if the input length is less than the specified length
function min_val($input, $length)
{
  if (strlen($input) < 3) {
    return true;
  }
  return false;
}


// Check if the input length is greater than the specified length
function max_val($input, $length)
{
  if (strlen($input) > 25) {
    return true;
  }
  return false;
}


// Validate the email format
function email_val($email)
{
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }
  return true;
}


// Check if the phone number length is not 11
function check_num_pass($num)
{
  $count_num = strlen($num);
  if ($count_num != 11) {
    return true;
  } else {
    return false;
  }
}


// Convert a CSV file to an array
function convert_csv_to_array($filecsv)
{
  $all_data = [];
  if (($handle = fopen($filecsv, "r")) != false) {
    while (($data = fgetcsv($handle, 1024, ",")) != false) {
      $all_data[] = $data;
    }
    fclose($handle);
  }
  return $all_data;
}


// Check if the user exists based on email and password
function check_user_found($users, $email, $password)
{
  foreach ($users as $user) {
    if ($user[2] == $email && $user[3] == sha1($password)) {
      return $user;
    }
  }
  return false;
}


// Check if a specific GET input is not set
function check_get_input($input)
{
  if (!isset($_GET[$input])) {
    return true;
  }
  return false;
}


// Check if a specific GET input is numeric
function check_id_is_numeric($id)
{
  if (!is_numeric($_GET[$id])) {
    return true;
  }
  return false;
}


// Check if a product ID exists in the data
function check_id_in_my_data($id)
{
  $products = get_products("../data/products.json");
  $exist = false;
  foreach ($products as $product) {
    if ($_GET[$id] == $product["category_id"]) {
      $exist = true;
    }
  }
  return $exist;
}
