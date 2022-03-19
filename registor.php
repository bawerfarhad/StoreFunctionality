
<?php
session_start();
include 'Header.php';
include 'Functions/functions.php';

  if (isset($_POST['register'])) {
      $username= $_POST['username'];
      $password= $_POST['password'];
      $email=$_POST['email'];

      $sql= "insert into users (id, username, password, email) values( null, '$username','$password', '$email' ); ";
      include 'Functions/CreateDb.php';

      $qry= mysqli_query(  $this->con,$sql) or die("data inserted error");
      if ($qry){
        echo"$username registered successfully "; 
      }

  }

?>


<title>Register</title>
<!-- plugins:css -->
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->

</head>
<body>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">

            <h4>New here?</h4>
            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
            <form class="pt-3" method="POST" name="register">
              <div class="form-group">
                <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control form-control-lg my-2" id="email" placeholder="Email">
              </div>


              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
              </div>
              <div class="mb-4">

              </div>
              <div class="mt-3">
                <input type="submit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP"/>

              </div>
              <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="login.php" class="text-primary">Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

<?php include 'Footer.php';?>
