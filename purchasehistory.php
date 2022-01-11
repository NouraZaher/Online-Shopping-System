<?php include('include/head.php') ?>
<?php include('include/config.php') ?>


	<?php
	$username = $_SESSION['username'];
	?>


  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>



            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">



  <!--user profile-->
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                  $username = $_SESSION['username'];
                  ?>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $username; ?> </span>
                  <img class="img-profile rounded-circle" src="img/admin.png">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                  <a class="dropdown-item" href="purchasehistory?open=<?php echo "$username"; ?>">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Purchase History
                  </a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <!--user profie-->

          </nav>

  <hr>
  <br>


	    <!-- End of Topbar -->

	    <!-- Begin Page Content -->

<div class="container-fluid">

  <div class="row">




    <div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">

      </h1>
      <h3>Your Order History</h3>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Picture</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                </tr>
              </thead>
              <?php
              $query = "SELECT p.store_id as stor_id,p.product_id as prod_id,p.product_name as prod_name, p.product_img as prod_img, p.product_price as prod_price,
               o.product_discount as product_dis, o.def as def, o.quantity as quan, o.order_id as ord_id
              FROM products as p, orders as o WHERE p.product_id = o.product_id and o.def = 'sent' and o.customerName = '$username'";

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
