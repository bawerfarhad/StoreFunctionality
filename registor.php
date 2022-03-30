<?php
session_start();
include 'Header.php';
include 'Functions/functions.php';
include 'db-connection.php';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bahsstore";


if (isset($_POST['reg'])) {
  $uname=$_POST['uname'];
  $password=$_POST['password'];
  $email=$_POST['email'];


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if($uname!="" && $password!="" && $email!=""){
  $sql = "INSERT INTO `users`(`id`, `username`, `password`, `email`) VALUES (null,'$uname','$password','$email');";
  // use exec() because no results are returned
 $conn->exec($sql);
  echo "New record created successfully";
  header('location:index.php');}
  else {
    echo "<center><h3>fileds are empy, please fill all fields</h3></center>";
  }

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
}

$conn = null;

?>





<title>Register</title>
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


            <form class="pt-3" method="POST" action="registor.php">
              <div class="form-group">
                <input type="text" name="uname" id="username"  class="form-control form-control-lg" id="username" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control form-control-lg my-2" id="email" placeholder="Email">
              </div>


              <div class="form-group">
                <input type="password" name="password" id="password"  class="form-control form-control-lg" id="password" placeholder="Password">
              </div>
              <div class="mb-4">

              </div>
              <div class="mt-3">
                <input type="submit" name="reg" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP"/>

              </div>
              <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="index.php" class="text-primary">Login</a>
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
