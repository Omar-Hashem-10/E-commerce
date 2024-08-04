<?php include_once ("core/functions.php"); ?>
<?php include_once ("inc/header.php"); ?>
<?php include_once ("inc/nav.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto my-2">
      <h2 class="border p-2 my-2 text-center">Your Profile</h2>
      <!-- Check if user is registered and authenticated -->
      <?php if (isset($_SESSION["auth_register"])): ?>
        <h2 class="border my-2 bg-info text-white p-2">Id: <?= $_SESSION["auth_register"][0] ?></h2>
        <h2 class="border my-2 bg-success text-white p-2">Name: <?= $_SESSION["auth_register"][1] ?></h2>
        <h2 class="border my-2 bg-primary text-white p-2">Email: <?= $_SESSION["auth_register"][2] ?></h2>
        <!-- Check if user is logged in and authenticated -->
      <?php elseif (isset($_SESSION["auth_login"])): ?>
        <h2 class="border my-2 bg-info text-white p-2">Id: <?= $_SESSION["auth_login"][0] ?></h2>
        <h2 class="border my-2 bg-success text-white p-2">Name: <?= $_SESSION["auth_login"][1] ?></h2>
        <h2 class="border my-2 bg-primary text-white p-2">Email: <?= $_SESSION["auth_login"][2] ?></h2>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php include_once ("inc/footer.php"); ?>