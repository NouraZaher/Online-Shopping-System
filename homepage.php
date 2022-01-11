<?php include('include/head.php') ?>
<?php include('include/config.php') ?>
<?php include('include/homepagenav.php') ?>



<!-- start deck-->
<?php
$query = "SELECT * FROM stores ";
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
          <a href="homepage_server.php?fav=<?php echo $row['store_id']; ?>" class="btn btn-primary">Add To Favorite </a>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
      </div>
        </div>
      </div>
    </div>
  <?php } ?>


  </div>
</div>

<!-- end deck-->
          <br>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

  <?php include('include/homepagefooter.php') ?>
