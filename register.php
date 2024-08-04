<?php include_once ("inc/header.php"); ?>
<?php include_once ("inc/nav.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto my-5">
      <h2 class="border p-2 my-2 text-center">Register</h2>
      <!-- Registration form -->
      <?php if (isset($_SESSION["errors_register"])): ?>
        <?php foreach ($_SESSION["errors_register"] as $errors_register): ?>
          <div class="alert alert-danger text-center">
            <?php echo $errors_register; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      <?php unset($_SESSION["errors_register"]); ?>
      <!-- Registration form -->
      <form action="handelers/handel-register.php" method="POST" class="border p-3">
        <div class="form-group p-2 my-1">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group p-2 my-1">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group p-2 my-1">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group p-2 my-1">
          <input type="submit" value="Register" class="form-control text-white bg-primary">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once ("inc/footer.php"); ?>