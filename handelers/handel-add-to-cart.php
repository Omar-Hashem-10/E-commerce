<?php
session_start();
include_once ("../core/functions.php");
include_once ("../core/validations.php");
$products = get_products("../data/products.json");

if (check_get_input("id")) {
  echo "The Id Is Not set<br>";
} elseif (check_id_is_numeric("id")) {
  echo "The Id Is Not numeric<br>";
}

if (check_id_in_my_data("id") == false) {
  echo "The Id Is Not Found";
}

intial_cart();
add_to_cart($_GET["id"]);
redirect("../product.php");