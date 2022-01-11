

<?php include('include/head.php') ?>
<?php include('include/config.php') ?>


<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block ">
                <img src="loginimage.png" style="width: 110%;"></img>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                  </div>
                  <form class="user" action="signup_server.php" method="post">
                    <div class="form-group">
                      <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter username...">
                    </div>
                    <div class="form-group">
                      <input name="full_name" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your name...">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                  </form>
                  <br>

                  <div class="text-center">
                    <a class="small" href="logincustomer.php">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

<?php include('include/foot.php') ?>
