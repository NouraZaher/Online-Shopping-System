<?php include('include/head.php') ?>
<?php include('include/config.php') ?>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5">
        <div class="card border-0 shadow-lg my-5">
          <div class="card-body p-0">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="signin_server_owner.php" method="post">
                    <div class="form-group">
                      <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
  </div>

<?php include('include/foot.php') ?>
