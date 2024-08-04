<?php include_once ("core/functions.php"); ?>
<?php include_once ("inc/header.php"); ?>
<?php include_once ("inc/nav.php"); ?>
<?php $products = get_products("data/products.json"); ?>

<h1 class="my-5 text-center">Product Page</h1>

<div class="mt-5">
  <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
      <div class="col-md-10">
        <!-- Loop through each product in the products array -->
        <?php foreach ($products as $product): ?>
          <div class="row p-2 bg-white border rounded">
            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                src="<?= $product["image"] ?>"></div>
            <div class="col-md-6 mt-1">
              <h5><?= $product["name"] ?></h5>
              <p class="text-justify text-truncate para mb-0"><?= $product["description"] ?><br><br></p>
            </div>
            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
              <div class="d-flex flex-row align-items-center">
                <h4 class="mr-1">$<?= $product["price"] ?></h4>
              </div>
              <h6 class="text-success"><?php echo get_categorys_by_id("data/categorys.json", $product["categoryId"])["name"]; ?>
              </h6>
              <div class="d-flex flex-column mt-4">
                <button class="btn btn-primary btn-sm" type="button">Details</button>
                <a href="<?= 'handelers/handel-add-to-cart.php?id= ' . $product["categoryId"]; ?>"
                  class="btn btn-outline-primary btn-sm mt-2">Add to Cart</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php include_once ("inc/footer.php"); ?>