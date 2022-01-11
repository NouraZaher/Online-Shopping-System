<?php include('include/head.php') ?>
<?php include('include/config.php') ?>
<?php include('include/homepagenav.php') ?>

<!-- start deck-->
<?php
if(isset($_GET['search'])){
  $search_name = $_GET['search'];
}
$query = "SELECT * FROM store WHERE store_name Like '%$search_name%' or store_address = '%$search_name%'";
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
          <h5 class="card-title"><?php echo $row['store_name']; ?></h5>
          <p class="card-text"><?php echo $row['store_category']; ?></p>
          <p class="card-text"><?php echo $row['store_address']; ?></p>
          <p class="card-text"><?php echo $row['store_phonenumber']; ?></p>
          <a href="productpage.php?open=<?php echo $row['store_id']; ?>" class="btn btn-primary">Visit Store</a>
        </div>
      </div>
    </div>
  <?php } ?>


  </div>
</div>

<!-- end deck-->

<?php include('include/homepagefooter.php') ?>
