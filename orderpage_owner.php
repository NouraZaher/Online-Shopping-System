<?php include('include/head.php') ?>
<?php include('include/config.php') ?>


	<?php
	$username = $_SESSION['username'];
	?>

<body id="page-top">
<div id="wrapper">

	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	  <hr class="sidebar-divider my-0">
	  <li class="nav-item active">
	    <a class="nav-link" href="ownerpage.php">
	      <i class="fas fa-fw fa-tachometer-alt"></i>
	      <span>Dashboard</span></a>
	  </li>
	  <hr class="sidebar-divider">

	  <div class="sidebar-heading">
	    Interface
	  </div>



	  <!-- Nav Item - Utilities Collapse Menu -->
	  <li class="nav-item">
	    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
	      <i class="fas fa-fw fa-wrench"></i>
	      <span>Control Panel</span>
	    </a>
	    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
	      <div class="bg-white py-2 collapse-inner rounded">
	        <h6 class="collapse-header">Tools</h6>
	        <!-- add store -->
	        <a class="collapse-item" href="orderhistory_owner.php">Orders History</a>
	      </div>
	    </div>
	  </li>
	  <div class="text-center d-none d-md-inline">
	    <button class="rounded-circle border-0" id="sidebarToggle"></button>
	  </div>
	</ul>





<div id="content-wrapper" class="d-flex flex-column">
<div id="content">

	<!-- Content Wrapper -->
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Number Of Orders</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php

                      $count_query = "SELECT COUNT(o.order_id) FROM orders as o,stores as s WHERE o.store_id = s.store_id and s.username = '$username' and o.def = 'ordered' ";
                      $getresults = mysqli_query($db, $count_query);
                      $row = mysqli_fetch_array($getresults);

                      echo $row['COUNT(o.order_id)'];
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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number Of Dispatch Orders</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php

                          $count_query = "SELECT COUNT(o.order_id) FROM orders as o,stores as s WHERE o.store_id = s.store_id and s.username = '$username' and o.def = 'sent' ";
                          $getresults = mysqli_query($db, $count_query);
                          $row = mysqli_fetch_array($getresults);

                          echo $row['COUNT(o.order_id)'];
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


    <div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">

      </h1>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Picture</th>
                  <th>Price/pice</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Control</th>
                </tr>
              </thead>
              <?php
              $query = "SELECT p.store_id as stor_id,p.product_id as prod_id,p.product_name as prod_name, p.product_img as prod_img, p.product_price as prod_price,
               o.product_discount as product_dis, o.def as def, o.quantity as quan, o.order_id as ord_id
              FROM products as p join orders as o on p.product_id = o.product_id join stores as s on  o.store_id = s.store_id WHERE  s.username = '$username' and o.def = 'ordered'";

              $getresults = mysqli_query($db, $query); ?>
              <?php while ($row = mysqli_fetch_array($getresults)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['prod_name']; ?></td>
                    <div class="crop">
                      <td><img
                        style="width: 150px;"
                        src="<?php echo $row['prod_img']; ?>" alt=""></td>
                    </div>

                    <td><?php
                      $sumprice = 0;
                     if ($row['product_dis']>0)
                    {
                      $sumprice = (($row['prod_price']*$row['product_dis'])/100);
                    }else{
                      $sumprice = $row['prod_price'];
                    }
                    echo "$sumprice";
                     ?></td>
                    <td><?php echo $row ['quan']; ?></td>
                    <td><?php
                      $sumprice = 0;
                     if ($row['product_dis']>0)
                    {
                      $sumprice = (($row['prod_price']*$row['product_dis'])/100)*$row['quan'];
                    }else{
                      $sumprice = $row['prod_price'];
                    }
                    echo "$sumprice";
                     ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="orderpage_server_owner.php?edit=<?php echo $row['ord_id']; ?>" class="btn btn-secondary" >Dispatch</a>
                      </div>

                    </td>
                  </tr>
                </tbody>


            <?php } ?>

            </table>
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
