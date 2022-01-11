<?php include('include/head.php') ?>
<?php include('include/config.php') ?>
<?php include('include/navupdate_owner.php') ?>
<?php
if (isset($_GET['edit'])) {
$product_id = $_GET['edit'];}
$_SESSION['product_id'] = $product_id;
$query = "SELECT  product_name, product_price,product_description,product_discount,product_cost FROM products WHERE products.product_id = '$product_id' ";
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
                    <h1 class="h4 text-gray-900 mb-4">Edit product </h1>
                  </div>
                  <form class="" action="product_server_owner.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Product Name</label>
                              <input name="product_name" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['product_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Upload Product Image</label>
                                  <input type="file" name="product_img" value="">
                                </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Price</label>
                              <input name="product_price" type="number" class="form-control" id="formGroupExampleInput2" value="<?php echo $row['product_price']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Description</label>
                              <input name="product_description" type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $row['product_description']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Discount</label>
                              <input name="product_discount" type="number" class="form-control" id="formGroupExampleInput2" value="<?php echo $row['product_discount']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Cost</label>
                              <input name="product_cost" type="number" class="form-control" id="formGroupExampleInput2" value="<?php echo $row['product_cost']; ?>">
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
