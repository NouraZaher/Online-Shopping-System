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

      <?php
      $query = "SELECT s.store_id,s.store_name,s.store_category,s.store_address,s.store_phonenumber FROM stores as s, fav as f WHERE s.store_id=f.store_id and f.username = '$username'  ";
      $getresults = mysqli_query($db, $query);
      ?>

      <div class="container">
        <div class="row">
      <?php while ($row = mysqli_fetch_array($getresults)) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-center">


            <br>
              <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <h5 class="card-title"> <?php echo $row['store_name']; ?></h5>
                <p class="card-text">Store Category : <?php echo $row['store_category']; ?></p>
                <p class="card-text">Store Address : <?php echo $row['store_address']; ?></p>
                <p class="card-text">Store Phonenumber : <?php echo $row['store_phonenumber']; ?></p>
                <a href="productpage.php?open=<?php echo $row['store_id']; ?>" class="btn btn-primary">Visit Store</a>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
              </div>
            </div>
          </div>
        <?php } ?>


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
