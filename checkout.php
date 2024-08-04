<?php include_once ("inc/header.php"); ?>

<?php include_once ("inc/nav_for_back.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto my-5">
      <h2 class="border p-2 my-2 text-center">Checkout</h2>
      <!-- Display checkout errors if any -->
      <?php if (isset($_SESSION["errors_checkout"])): ?>
        <?php foreach ($_SESSION["errors_checkout"] as $errors_checkout): ?>
          <div class="alert alert-danger text-center">
            <?php echo $errors_checkout; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      <!-- Clear checkout errors after displaying them -->
      <?php unset($_SESSION["errors_checkout"]); ?>
      <!-- Display success message if checkout has been successfully submitted -->
      <?php if (isset($_SESSION["auth_checkout"])): ?>
        <div class="alert alert-success" role="alert">
          Your data has been successfully submitted!
        </div>
      <?php endif; ?>
      <!-- Checkout form -->
      <form action="handelers/handel-checkout.php" method="POST" class="border p-3">
        <div class="form-group p-2 my-1">
          <label for="governorate" class="form-label">Select Governorate</label>
          <select id="governorate" name="governorate" class="form-control">
            <option value="">Choose...</option>
            <option value="Cairo">Cairo</option>
            <option value="Alexandria">Alexandria</option>
            <option value="Giza">Giza</option>
            <option value="Qalyubia">Qalyubia</option>
            <option value="Port Said">Port Said</option>
            <option value="Suez">Suez</option>
            <option value="Luxor">Luxor</option>
            <option value="Aswan">Aswan</option>
            <option value="Asyut">Asyut</option>
            <option value="Beheira">Beheira</option>
            <option value="Beni Suef">Beni Suef</option>
            <option value="Dakahlia">Dakahlia</option>
            <option value="Damietta">Damietta</option>
            <option value="Faiyum">Faiyum</option>
            <option value="Gharbia">Gharbia</option>
            <option value="Ismailia">Ismailia</option>
            <option value="Kafr El Sheikh">Kafr El Sheikh</option>
            <option value="Matruh">Matruh</option>
            <option value="Minya">Minya</option>
            <option value="Monufia">Monufia</option>
            <option value="New Valley">New Valley</option>
            <option value="North Sinai">North Sinai</option>
            <option value="Red Sea">Red Sea</option>
            <option value="Sharqia">Sharqia</option>
            <option value="Sohag">Sohag</option>
            <option value="South Sinai">South Sinai</option>
            <option value="Qena">Qena</option>
          </select>
        </div>
        <div class="form-group p-2 my-1">
          <label for="name">Full name (First and Last name)</label>
          <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group p-2 my-1">
          <label for="mobile">Mobile number</label>
          <input type="tel" name="mobile" class="form-control" id="mobile">
        </div>
        <div class="form-group p-2 my-1">
          <label for="street_name">Street name</label>
          <input type="text" name="street_name" class="form-control" id="street_name">
        </div>
        <div class="form-group p-2 my-1">
          <input type="submit" value="Checkout" class="form-control text-white bg-primary">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once ("inc/header.php"); ?>