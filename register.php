<?php include('include/head.php') ?>
<?php include('include/config.php') ?>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5">
        <div class="card border-0 shadow-lg my-3">
          <div class="card-body p-0">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                  </div>
                  <form class="user" action="signup_server_owner.php" method="post">
                    <div class="form-group">
                      <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter username...">
                    </div>
                    <div class="form-group">
                      <input name="full_name" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your name...">
                    </div>
                    <div class="form-group">
                      <input name="address" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your address...">
                    </div>
                    <div class="form-group">
                      <input name="bdate" type="date" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your birthday...">
                    </div>
                    <div class="form-group">
                      <input name="phone_number" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your phone number...">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
  </div>

<?php include('include/foot.php') ?>
