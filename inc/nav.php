<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <!-- Login and Register links shown only if user is not authenticated -->
        <?php if (!isset($_SESSION["auth_register"]) && !isset($_SESSION["auth_login"])): ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <!-- Profile, Product, and Cart links shown only if user is authenticated -->
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">
              Cart
              <span class="text-danger">
                <?php if (isset($_SESSION["cart"])): ?>
                  <?= count($_SESSION["cart"]); ?> <!-- Show number of items in cart -->
                <?php endif; ?>
              </span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <!-- Feedback and Orders links shown only if user has completed checkout -->
        <?php if (isset($_SESSION["auth_checkout"])): ?>
          <li class="nav-item">
            <a class="nav-link" href="feedback.php">Feedback</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">Orders</a>
          </li>
        <?php endif; ?>
        <!-- Logout link shown if user is authenticated -->
        <?php if (isset($_SESSION["auth_register"]) || isset($_SESSION["auth_login"])): ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>