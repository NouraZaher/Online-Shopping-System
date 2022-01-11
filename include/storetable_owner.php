

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Your Stores</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Phone Number</th>
              <th>Category</th>
              <th>Control</th>
            </tr>
          </thead>
          <?php
          $username= $_SESSION['username'];
          $query = "SELECT store_id, username, store_name, store_address, store_phonenumber,store_category FROM stores WHERE stores.username = '$username' ";
          $getresults = mysqli_query($db, $query); ?>
<?php while ($row = mysqli_fetch_array($getresults)) { ?>

          <tbody>
            <tr>
              <td><?php echo $row['store_name']; ?></td>
              <td><?php echo $row['store_address']; ?></td>
              <td><?php echo $row['store_phonenumber']; ?></td>
              <td><?php echo $row['store_category']; ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="UpdateStore.php?edit=<?php echo $row['store_id']; ?>" class="btn btn-secondary" >Edit</a>
                  <a href="productpage_owner.php?open=<?php echo $row['store_id']; ?>" class="btn btn-success" >Open</a>
                  <a href="owner_server.php?del=<?php echo $row['store_id']; ?>" class="btn btn-warning">Delete</a>
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
