
<?php
session_start();
include 'Header.php';
include 'Functions/functions.php';
include 'db-connection.php';

$total_price = $_SESSION['total_p'];






$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bahsstore";


if (isset($_POST['order'])) {
  $uname=$_POST['uname'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone_number=$_POST['phone_number'];
  $totalprice= $total_price;


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if($uname!="" && $email!="" && $address!="" && $phone_number!=""){
  $sql = "INSERT INTO `orders`(`id`, `username`, `email`, `address`, `phone_number`,`total_price`) VALUES (null,'$uname','$email','$address','$phone_number','$totalprice');";
  // use exec() because no results are returned
 $conn->exec($sql);
  echo "New record created successfully";
  header('location:home.php');}
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
            <h4>Buy now</h4>
            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>


            <form class="pt-3" method="POST" action="order.php">
              <div class="form-group">
                <input type="text" name="uname" id="username"  class="form-control form-control-lg"  placeholder="Username">
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control form-control-lg my-2"  placeholder="Email">
              </div>


              <div class="form-group">
                <input type="text" name="address" id="address"  class="form-control form-control-lg"  placeholder="address">
              </div>
              <div class="mb-4">

                <div class="form-group">
                  <input type="number" name="phone_number" id="phone_number"  class="form-control my-2 form-control-lg"  placeholder="phone_number">
                </div>
                <div class="mb-4">

                  <div class="form-group">
                    <input type="text" name="total_price" id="total_price"  class="form-control my-2 form-control-lg" disabled  value="<?php echo $_SESSION['total_p']; ?>">
                  </div>
                  <div class="mb-4">

              </div>
              <div class="mt-3">
                <input type="submit" name="order" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="complete purchiase"/>

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








<?php  include 'Footer.php'; ?>
