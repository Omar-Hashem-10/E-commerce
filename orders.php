<?php include_once ("inc/header.php"); ?>
<?php include_once ("inc/nav.php"); ?>

<h1 class="p-2 my-2 text-center">Orders Page</h1>
<?php
$json_data = file_get_contents("data/orders-data.json");
$all_data = json_decode($json_data, true);
?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      Order Information
    </div>
    <div class="card-body">
      <h5 class="card-title">Order Summary</h5>
        <!-- Check if order data is available -->
      <?php if (isset($all_data)): ?>
        <p class="card-text"><strong>Governorate: <?= $all_data[0] ?></strong> </p>
        <p class="card-text"><strong>Name: <?= $all_data[1] ?></strong></p>
        <p class="card-text"><strong>Mobile Number: <?= $all_data[2] ?></strong> </p>
        <p class="card-text"><strong>Street Name: <?= $all_data[3] ?></strong> </p>
        <p class="card-text"><strong>Product Name 1 : <?= $all_data[4] ?></strong></p>
        <!-- Loop through additional product names if available -->
        <?php
        for ($i = 5; $i <= 9; $i++):
          if (isset($all_data[$i])): ?>
            <p class="card-text"><strong>Product Name <?= $i - 3 ?> : <?= $all_data[$i] ?></strong></p>
          <?php
          endif;
        endfor;
        ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include_once ("inc/footer.php"); ?>