<?php include('include/head.php') ?>
<?php include('include/config.php') ?>
<?php
if (isset($_GET['open'])) {
	$store_id = $_GET['open'];
  $_SESSION['store_id'] = $store_id;
}
  ?>

	<?php
	$username = $_SESSION['username'];
	?>

<body id="page-top">
<div id="wrapper">

<?php include('include/sidenavprod_owner.php') ?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">

	<!-- Content Wrapper -->
	    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
	        <i class="fa fa-bars"></i>
	      </button>


	      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
	        <div class="input-group">
	          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
	          <div class="input-group-append">
	            <button class="btn btn-primary" type="button">
	              <i class="fas fa-search fa-sm"></i>
	            </button>
	          </div>
	        </div>
	      </form>

	      <!-- Topbar Navbar -->
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item dropdown no-arrow d-sm-none">
	          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-search fa-fw"></i>
	          </a>
	          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
	            <form class="form-inline mr-auto w-100 navbar-search">
	              <div class="input-group">
	                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
	                <div class="input-group-append">
	                  <button class="btn btn-primary" type="button">
	                    <i class="fas fa-search fa-sm"></i>
	                  </button>
	                </div>
	              </div>
	            </form>
	          </div>
	        </li>

	        <!-- Nav Item - Notif -->
	        <li class="nav-item dropdown no-arrow mx-1">
	          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-bell fa-fw"></i>
	            <span class="badge badge-danger badge-counter">3+</span>
	          </a>
	          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
	            <h6 class="dropdown-header">
	              Orders
	            </h6>
	            <a class="dropdown-item d-flex align-items-center" href="#">
	              <div>
	                <?php
	                $query = "SELECT p.product_id,p.product_name, p.product_img
	                FROM products as p, orders as o, stores as s WHERE p.product_id = o.product_id and o.store_id=s.store_id and s.username = '$username' and o.def = 'ordered' Limit 3";
	                $getresults = mysqli_query($db, $query);
	                ?>
	                <?php while ($row = mysqli_fetch_array($getresults)) { ?>
	                <a class="dropdown-item d-flex align-items-center" href="#">
	                  <div class="dropdown-list-image mr-3">
	                    <img class="rounded-circle" src="<?php echo $row['product_img']; ?>" alt="">
	                    <div class="status-indicator bg-success"></div>
	                  </div>
	                  <div class="font-weight-bold">
	                    <div class="text-truncate"><?php echo $row['product_name']; ?></div>
	                  </div>
	                <?php }?>
	                </a>
	              </div>
	            </a>

	            <a class="dropdown-item text-center small text-gray-500" href="orderpage_owner">Show All Orders</a>
	          </div>
	        </li>


	        <div class="topbar-divider d-none d-sm-block"></div>

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
	    <!-- End of Topbar -->

	    <!-- Begin Page Content -->

<div class="container-fluid">

  <div class="row">



    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Number Of Product</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php


                $count_query = "SELECT COUNT(product_id) FROM products WHERE products.store_id = '$store_id' ";
                $getresults = mysqli_query($db, $count_query);
                $row = mysqli_fetch_array($getresults);

                echo $row['COUNT(product_id)'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-archive fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number Of Orders</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
										        <?php

									                $count_query = "SELECT COUNT(order_id) FROM orders WHERE store_id = '$store_id' and def = 'ordered' ";
									                $getresults = mysqli_query($db, $count_query);
									                $row = mysqli_fetch_array($getresults);

									                echo $row['COUNT(order_id)'];
									                ?>
											</div>
                </div>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Earnings</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php

											$count_query = "SELECT p.product_price as price , p.product_cost as cost , o.quantity as quan, o.product_discount as discount FROM orders as o,products as p WHERE o.product_id = p.product_id and o.store_id ='$store_id' and o.def = 'ordered' ";
											$getresults = mysqli_query($db, $count_query);

											$sumprice = 0;
											$sumcost = 0;

											while($row = mysqli_fetch_array($getresults))
											{
												if($row['discount'] != 0){
													$sumprice = $sumprice + ((($row['discount']*$row['price'])/100)*$row['quan']);
												}
												else{
													$sumprice = $sumprice + ($row['price'] * $row['quan']);
												}
												$sumcost = $sumcost + $row['cost'];
											}

											$earning = $sumprice - $sumcost;

											echo "$earning";
											?>

							</div>
            </div>
            <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

            </div>
          </div>
        </div>
      </div>
    </div>

<?php include('include/producttable_owner.php') ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--add form-->
        <form class="" action="product_server_owner.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="formGroupExampleInput">Product Name</label>
                    <input name="product_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                      <label for="formGroupExampleInput">Upload Product Image</label>
                        <input type="file" name="product_img" value="">
                      </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Price</label>
                    <input name="product_price" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Enter Product Price">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Description</label>
                    <input name="product_description" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter Description">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Discount</label>
                    <input name="product_discount" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Enter Discount">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Cost</label>
                    <input name="product_cost" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Enter Produt Cost">
                  </div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Quantity</label>
										<input name="quantity" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Enter Produt Quantity">
									</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button name="submit" type="submit" class="btn btn-primary">Save changes</button>
                  </div>

        </form>

      </div>



    </div>
  </div>
</div>


  </div>
</div>
</div>


<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; BAU - Database 2020</span>
    </div>
  </div>
</footer>
</div>
</div>






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

</body>

  <?php include('include/foot.php') ?>
