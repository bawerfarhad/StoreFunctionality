<?php include 'Header.php';
include 'Functions/functions.php';
include 'db-connection.php';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bahsstore";


  if(isset($_POST["log"])){
    $email=$_POST["email"];
    $password=$_POST["password"];


      if($email!="" && $password!=""){
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql=" select * from users where email='$email' && password='$password' ;";
          // use exec() because no results are returned
          $conn->exec($sql);
           echo "login successfully";
           header('location:home.php');

        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
      }else {
        echo "<center><h3>fields are empty</h3></center>";
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
            <h4>Login to your account</h4>
            <h6 class="font-weight-light">to access shoping in our website please login</h6>


            <form class="pt-3" method="POST" action="index.php">
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control form-control-lg my-2" id="email" placeholder="Email">
              </div>


              <div class="form-group">
                <input type="password" name="password" id="password"  class="form-control form-control-lg" id="password" placeholder="Password">
              </div>
              <div class="mb-4">

              </div>
              <div class="mt-3">
                <input type="submit" name="log" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="login"/>

              </div>
              <div class="text-center mt-4 font-weight-light">
                dont have an account yet?<a href="registor.php" class="text-primary">create an account</a>
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
