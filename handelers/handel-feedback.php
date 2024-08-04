<?php session_start();
include_once ("../core/functions.php");
include_once ("../core/validations.php");
$errors_feedback = [];



if (check_request_method("POST") && check_post_input("name")) {
  foreach ($_POST as $key => $value) {
    $$key = sanitize_input($value);
  }

  // Validations 
  // name => required, min:3, max:25

  if (required_val($name)) {
    $errors_feedback[] = "Name Is Required";
  } elseif (min_val($name, 3)) {
    $errors_feedback[] = "Name Must Be Greater Than 3 Chars";
  } elseif (max_val($name, 25)) {
    $errors_feedback[] = "Name Must Be Smaller Than 25 Chars";
  }

  // Validations 
  // quality => required

  if (required_val($quality)) {
    $errors_feedback[] = "Quality Is Required";
  }

  // Validations 
  // price => required

  if (required_val($price)) {
    $errors_feedback[] = "Price Is Required";
  }

  // Validations 
  // delivery => required

  if (required_val($delivery)) {
    $errors_feedback[] = "Delivery Is Required";
  }

  // Validations 
  // comments => required

  if (required_val($comments)) {
    $errors_feedback[] = "Comments Is Required";
  }

  if (empty($errors_feedback)) {
    $data_feedback_of_user = [$name, $quality, $price, $delivery, $comments];
    $_SESSION["auth_feedback"] = $data_feedback_of_user;
    save_data_to_json($data_feedback_of_user, "../data/feedback-data.json");
    redirect("../feedback.php");
  } else {
    $_SESSION["errors_feedback"] = $errors_feedback;
    redirect("../feedback.php");
    die;
  }

}
