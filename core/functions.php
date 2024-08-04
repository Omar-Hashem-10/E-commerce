<?php


// Print data in a formatted way for debugging
function dd($data)
{
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}


// Check if the request method matches the expected method (e.g., POST or GET)
function check_request_method($method)
{
  if ($_SERVER["REQUEST_METHOD"] == $method) {
    return true;
  }
  return false;
}


// Check if a specific POST input is set
function check_post_input($input)
{
  if (isset($_POST[$input])) {
    return true;
  }
  return false;
}


// Sanitize input by trimming and escaping special characters
function sanitize_input($input)
{
  return trim(htmlspecialchars(htmlentities($input)));
}


// Redirect to a specific path
function redirect($path)
{
  return header("Location: $path");
  exit;
}


// Retrieve products from a JSON file
function get_products($file_json)
{
  $products = file_get_contents($file_json);
  $products = json_decode($products, true);
  return $products;
}


// Retrieve a product by its ID from a JSON file
function get_products_by_id($file_json, $id)
{
  $products = file_get_contents($file_json);
  $products = json_decode($products, true);

  foreach ($products as $product) {
    if ($product["categoryId"] == $id) {
      return $product;
    }
  }
}


// Retrieve a category by its ID from a JSON file
function get_categorys_by_id($file_json, $id)
{
  $categorys = file_get_contents($file_json);
  $categorys = json_decode($categorys, true);

  foreach ($categorys as $category) {
    if ($category["id"] == $id) {
      return $category;
    }
  }
}


// Initialize the cart session if it doesn't exist
function intial_cart()
{
  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
  }
}


// Add a product to the cart, or increase its quantity if already present
function add_to_cart($id)
{
  if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['qty']++;
  } else {
    $product = get_products_by_id("../data/products.json", $id);
    $_SESSION['cart'][$id]['price'] = $product['price'];
    $_SESSION['cart'][$id]['qty'] = 1;
  }
}


// Remove a product from the cart
function remove_from_cart($id)
{
  if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
  }
}


// Save data to a JSON file
function save_data_to_json($data, $filename)
{

  $json_data = json_encode($data, JSON_PRETTY_PRINT);

  return file_put_contents($filename, $json_data);
}


// Return a rating description based on the rating value
function rating($rate)
{
  if ($rate == 1 || $rate == 2) {
    return "Bad";
  } else {
    return "Good";
  }
}