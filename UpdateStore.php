<?php include('include/head.php') ?>
<?php include('include/config.php') ?>
<?php include('include/navupdate_owner.php') ?>
<?php
if (isset($_GET['edit'])) {
	$store_id = $_GET['edit'];}
$_SESSION['store_id'] = $store_id;
$query = "SELECT  store_name, store_address, store_phonenumber FROM stores WHERE stores.store_id = '$store_id' ";
$getresults = mysqli_query($db, $query);
$row = mysqli_fetch_array($getresults);
?>


<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5">
        <div class="card border-0 shadow-lg my-3">
          <div class="card-body p-0">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit Store </h1>
                  </div>
                  <form class="" action="owner_server.php" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Store Name</label>
                              <input name="store_name" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['store_name']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Store Adress</label>
                              <input name="store_address" type="text" class="form-control" id="formGroupExampleInput2"  value="<?php echo $row['store_address']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Phone number</label>
                              <input name="store_phonenumber" type="text" class="form-control" id="formGroupExampleInput2" value= "<?php echo $row['store_phonenumber']; ?>">
                            </div>
														<div class="form-group">
															<label for="formGroupExampleInput2">Category</label>
															<input name="store_category" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter Category">
														</div>
                            <div class="modal-footer">
                              <button name ="edit1" type="submit" class="btn btn-secondary" >Edit</button>
                            </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
  </div>

<?php include('include/foot.php') ?>
