<?php include('includes/head.php') ?>
<?php include('includes/ownernav_owner.php') ?>

<br>

  <div class="container">
    <form action="owner_server.php" method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name of the Store</label>
    <div class="col-sm-10">
      <input name="store_name" type="text" class="form-control" id="inputEmail3" placeholder="Store Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input name="store_address" type="text" class="form-control" id="inputPassword3" placeholder="Adress">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-10">
      <input name="store_phonenumber" type="text" class="form-control" id="inputPassword3" placeholder="Phone Number">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button name="submit" type="submit" class="btn btn-primary">Add Store</button>
    </div>
  </div>
</form>
  </div>

<?php include('includes/foot.php') ?>
