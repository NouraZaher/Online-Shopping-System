<?php include('include/head.php') ?>
<?php include('include/config.php') ?>


<body id="page-top">
  <?php
  $username = $_SESSION['username'];
  ?>
  <!-- Page Wrapper -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">

	        <!-- Nav Item - User Information -->
	        <li class="nav-item dropdown no-arrow">
	          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

	            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $username; ?> </span>
	            <img class="img-profile rounded-circle" src="img/admin.png">
	          </a>
	          <!-- Dropdown - User Information -->
	          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
	            <a class="dropdown-item" href="#">
	              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
	              Profile
	            </a>
	            <a class="dropdown-item" href="#">
	              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
	              Settings
	            </a>
	            <div class="dropdown-divider"></div>
	            <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
	              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	              Logout
	            </a>
	          </div>
	        </li>
	      </ul>
	    </nav>
          <!--user profie-->
        </nav>
        <div class="container-fluid">
          <nav class="nav">
            <a class="nav-link" href="cartviewpage.php"> <- Get Back to cart</a>
          </nav>
<?php
if(isset($_GET['order']))
{
    $order_id = $_GET['order'];
    $query = "SELECT product_id
    FROM orders  WHERE order_id='$order_id' ";
    $getresults = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($getresults)) {
      $product_id = $row['product_id'];
    }
}


$query = "SELECT p.product_name, p.product_img, p.product_price, p.product_description, p.product_discount
FROM products as p WHERE p.product_id = '$product_id' ";
$getresults = mysqli_query($db, $query);

?>

<br>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8">
        <div class="card border-0 shadow-lg my-3">
          <div class="card-body p-0">
                <div class="p-5">
    <?php while ($row = mysqli_fetch_array($getresults)) {?>
    <form action="cartpage_server.php" method="post">
  <div class="form-group row">
    <div class="col-sm-10">
      <div class="crop">
      <img
        style="width: 150px;   margin-left: auto; margin-right: auto"
        src="<?php echo $row['product_img']; ?>" alt="">
        </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <h4><?php echo $row['product_name']; ?></h4>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <p><?php echo $row['product_description']; ?></p>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <p><?php echo $row['product_price']; ?>$ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $row['product_discount']; ?>%</p>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input name="order_address" type="text" class="form-control"  placeholder="Adress">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-10">
      <input name="phone_number" type="text" class="form-control"  placeholder="Phone Number">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
      <input name="quantity" type="number" class="form-control"  placeholder="Quantity">
    </div>
  </div>
  <div class="col-sm-10">
    <input name="order_id" type="text" class="form-control"  value="<?php echo "$order_id" ?> " hidden>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button name="submit" type="submit" class="btn btn-primary">Add Order</button>
    </div>
  </div>
</form>
<?php }?>
</div>
</div>
</div>
</div>
</div>
  </div>

  <br>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
  <div class="copyright text-center my-auto">
    <span>Copyright &copy; Your Website 2019</span>
  </div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
  <a class="btn btn-primary" href="index.php">Logout</a>
</div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
