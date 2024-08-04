<?php include_once ("core/functions.php"); ?>
<?php include_once ("inc/header.php"); ?>

<?php
$json_data = file_get_contents("data/feedback-data.json");
$feedback_data = json_decode($json_data, true);
?>
<?php
$json_data = file_get_contents("data/orders-data.json");
$all_data = json_decode($json_data, true);
?>

<?php include_once ("inc/nav_for_back.php") ?>

<div class="container">
  <div class="row">
    <div class="col-12 my-5">
      <h2 class="border p-2 my-2 text-center">Your Feedback</h2>
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Name</th>
            <th>Product Quality</th>
            <th>Price</th>
            <th>Delivery Speed</th>
            <th>Comments</th>
            <th>Your Products</th>
          </tr>
        </thead>
        <tbody>
          <!-- Check if feedback data exists -->
          <?php if (isset($feedback_data)): ?>
            <tr>
              <td><?= $feedback_data[0] ?></td>
              <!-- Loop through product quality, price, and delivery speed -->
              <?php for ($i = 1; $i <= 3; $i++): ?>
                <td>
                  <!-- Check rating value to determine text color -->
                  <?php if ($feedback_data[$i] == 1 || $feedback_data[$i] == 2): ?>
                    <p class="text-danger"><?= $feedback_data[$i] . "      " . rating($feedback_data[$i]) ?></p>
                  <?php else: ?>
                    <p class="text-success "><?= $feedback_data[$i] . "      " . rating($feedback_data[$i]) ?></p>
                  <?php endif; ?>
                </td>
              <?php endfor; ?>
              <td><?= $feedback_data[4] ?></td>
              <td>
              <?php endif; ?>
              <!-- Loop through additional product names if available -->
              <?php
              for ($i = 4; $i <= 9; $i++):
                if (isset($all_data[$i])): ?>
                  <p class="card-text"><strong>Product Name <?= $i - 3 ?> : <?= $all_data[$i] ?></strong></p>
                  <?php
                endif;
              endfor;
              ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?php include_once ("inc/footer.php"); ?>