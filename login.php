<?php include_once ("inc/header.php"); ?>
<?php include_once ("inc/nav.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto my-5">
      <h2 class="p-2 my-2 text-center">Login</h2>
      <!-- Display login errors if any -->
      <?php if (isset($_SESSION["errors_login"])): ?>
        <?php foreach ($_SESSION["errors_login"] as $errors_login): ?>
          <div class="alert alert-danger text-center">
            <?php echo $errors_login; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      <!-- Clear errors after displaying them -->
      <?php unset($_SESSION["errors_login"]); ?>
      <!-- Login form -->
      <form action="handelers/handel-login.php" method="POST" class="border p-3">
        <div class="form-group p-2 my-1">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group p-2 my-1">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group p-2 my-1">
          <input type="submit" value="Login" class="form-control text-white bg-primary">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once ("inc/footer.php"); ?>