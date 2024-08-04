<?php include_once ("inc/header.php"); ?>
<?php include_once ("inc/nav.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto my-5">
      <h2 class="border p-2 my-2 text-center">Feedback</h2>
      <!-- Display feedback errors if any -->
      <?php if (isset($_SESSION["errors_feedback"])): ?>
        <?php foreach ($_SESSION["errors_feedback"] as $errors_feedback): ?>
          <div class="alert alert-danger text-center">
            <?php echo $errors_feedback; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      <!-- Clear feedback errors after displaying them -->
      <?php unset($_SESSION["errors_feedback"]); ?>
      <!-- Display success message if feedback has been successfully sent -->
      <?php if (isset($_SESSION["auth_feedback"])): ?>
        <div class="alert alert-success" role="alert">
          Your feedback has been successfully sended!
        </div>
      <?php endif; ?>
      <!-- Display feedback form if feedback has not been sent -->
      <?php if (!isset($_SESSION["auth_feedback"])): ?>
        <form action="handelers/handel-feedback.php" method="POST" class="border p-3">
          <div class="form-group p-2 my-1">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group p-2 my-1">
            <label for="quality">Product Quality:</label>
            <input type="number" class="form-control" id="quality" name="quality" min="1" max="5">
          </div>

          <div class="form-group p-2 my-1">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" min="1" max="5">
          </div>

          <div class="form-group p-2 my-1">
            <label for="delivery">Delivery Speed:</label>
            <input type="number" class="form-control" id="delivery" name="delivery" min="1" max="5">
          </div>


          <div class="form-group p-2 my-1">
            <label for="comments">Comments:</label>
            <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
          </div>
          <div class="form-group p-2 my-1">
            <input type="submit" value="Send Feedback" class="form-control text-white bg-primary">
          </div>
        </form>
        <!-- Display thank you message and button if feedback has been sent -->
      <?php else: ?>
        <h3 class="border p-2 my-2 text-center">Thank you for Feeback</h>
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="button" class="btn btn-primary" onclick="window.location.href='your_feedback.php'">Show your
                  feedback</button>
              </div>
            </div>
          </div>
        <?php endif; ?>
    </div>
  </div>
</div>


<?php include_once ("inc/footer.php"); ?>