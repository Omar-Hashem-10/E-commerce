<?php include_once ("core/functions.php"); ?>
<?php include_once ("inc/header.php"); ?>
<?php include_once ("inc/nav.php"); ?>
<?php $data_name_of_order = []; ?>

<div class="mt-5">
<h2 class="border p-2 my-2 text-center">Your Products</h2>
  <table class="table">
    <thead>
      <!-- Table headers shown only if there are items in the cart -->
    <?php if(isset($_SESSION["cart"])): ?>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Categorys</th>
        <th scope="col">Product</th>
        <th scope="col">Qty</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
        <th scope="col">Handle</th>
      </tr>
      <?php endif; ?>
    </thead>
    <tbody>
      <!-- Table rows are shown only if there are items in the cart -->
      <?php if (isset($_SESSION["cart"])): ?>
        <?php foreach ($_SESSION["cart"] as $key => $item): ?>
          <tr>
            <th scope="row"><?= $key ?></th>
            <td>
              <?= get_categorys_by_id("data/categorys.json", get_products_by_id("data/products.json", $key)["categoryId"])["name"] ?>
            </td>
            <td><?= $data_name_of_order[] = get_products_by_id("data/products.json", $key)["name"]; ?></td>
            <td><?= $item['qty'] ?></td>
            <td>$<?= get_products_by_id("data/products.json", $key)["price"]; ?></td>
            <td>$<?= $item["qty"] * get_products_by_id("data/products.json", $key)["price"]; ?></td>
            <td><a href="handelers/remove_from_cart.php?id=<?= $key ?>" class="btn btn-danger">Remove</a></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      
    </tbody>
  </table>
  <!-- Store names of ordered items in session -->
  <?php $_SESSION["auth_data_name_of_order"] = $data_name_of_order; ?>
  <!-- Button to proceed to checkout shown only if there are items in the cart -->
  <?php if(isset($_SESSION["cart"])): ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary" onclick="window.location.href='checkout.php'">Proceed to Buy</button>
      </div>
    </div>
  </div>
  <?php endif; ?>


  <?php include_once ("inc/footer.php"); ?>