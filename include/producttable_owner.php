
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">
<?php
if (isset($_GET['open'])) {
	$store_id = $_GET['open'];
	$getresults =mysqli_query($db, "SELECT store_name FROM stores WHERE store_id=$store_id");
  $row = mysqli_fetch_array($getresults);
  echo $row['store_name'] ."'s Products";
  $_SESSION['store_id']=$store_id;
}
 ?>
  </h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Picture</th>
              <th>Price</th>
              <th>Description</th>
              <th>Discount</th>
              <th>profit</th>
              <th>Control</th>
            </tr>
          </thead>
          <?php
          $store_id= $_SESSION['store_id'];
          $username= $_SESSION['username'];
          $query = "SELECT store_id,product_id,product_name, product_img, product_price, product_description, product_discount
          FROM products WHERE products.store_id = '$store_id' ";
          $getresults = mysqli_query($db, $query); ?>
          <?php while ($row = mysqli_fetch_array($getresults)) { ?>

          <tbody>
            <tr>
              <td><?php echo $row['product_name']; ?></td>
              <div class="crop">
                <td><img
                  style="width: 150px;"
                  src="<?php echo $row['product_img']; ?>" alt=""></td>
              </div>

              <td><?php echo $row['product_price']; ?></td>
              <td><?php echo $row['product_description']; ?></td>
              <td><?php echo $row['product_discount']; ?></td>
              <td>
                <?php
                    $pro = $row['product_id'];
											$count_query = "SELECT  quantity as quan, product_discount as discount FROM orders WHERE product_id = '$pro'  and def = 'ordered' ";
											$getresults1 = mysqli_query($db, $count_query);

											$sumprice = 0;
											$sumcost = 0;

											while($row1 = mysqli_fetch_array($getresults1))
											{
                        $pro1 = $row['product_id'];
                        $count_query2 = "SELECT  product_price as price, product_cost as cost FROM products WHERE product_id = '$pro1' ";
  											$getresults2 = mysqli_query($db, $count_query2);
                        while($row2 = mysqli_fetch_array($getresults2))
  											{
    												if($row1['discount'] != 0){
    													$sumprice = ((($row1['discount']*$row2['price'])/100)*$row1['quan']);
    												}
    												else{
    													$sumprice = ($row2['price'] * $row1['quan']);
    												}
    												$sumcost = $row2['cost'];
                        }
											}

											$earning = $sumprice - $sumcost;

											echo "$earning";
											?>
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="UpdateProduct_owner.php?edit=<?php echo $row['product_id']; ?>" class="btn btn-secondary" >Edit</a>
                  <a href="product_server_owner.php?del=<?php echo $row['product_id']; ?>" class="btn btn-warning">Delete</a>
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
