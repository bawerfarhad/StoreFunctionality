<?php

include 'Header.php';
include '../db-connection.php';




    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bahsstore";


    if (isset($_POST['create'])) {

      $p_name=$_POST['p_name'];
      $p_price=$_POST['p_price'];
      $p_image= $_FILES['p_image']['name'];
      $path= "../Picture/" . $p_image;


    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO `products`(`id`, `product_name`, `product_price`, `product_image`) VALUES (null,'$p_name','$p_price','$path');";
      // use  because no results are returned
          $imagesaver= $conn->  query($sql);



        if($imagesaver){
          move_uploaded_file($_FILES["p_image"]["tmp_name"], "$path");
        }
      // header('location:index.php');

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    }
    $conn = null;

 ?>









 <div class="container-scroller">
   <div class="container-fluid page-body-wrapper full-page-wrapper">
     <div class="content-wrapper d-flex align-items-center auth px-0">
       <div class="row w-100 mx-0">
         <div class="col-lg-4 mx-auto">
           <div class="auth-form-light text-left py-5 px-4 px-sm-5">
             <h4>Create a new product</h4>
             <h6 class="font-weight-light">please fill this form to create a new product</h6>


             <form class="pt-3" method="POST" enctype="multipart/form-data" action="product.php">
               <div class="form-group">
                 <input type="text" name="p_name" id="p_name" class="form-control form-control-lg my-2" placeholder="product name">
               </div>

               <div class="form-group">
                 <input type="text" name="p_price" id="p_price" class="form-control form-control-lg my-2"  placeholder="product price">
               </div>

               <div class="form-group">
                 <input type="file" name="p_image" id="p_image"  class="form-control form-control-lg" placeholder="product image">
               </div>
               <div class="mb-4">

               </div>
               <div class="mt-3">
                 <input type="submit" name="create" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Create new product"/>
               </div>



             </form>


           </div>

         </div>
         <div class="my-5">
           <h4 class="my-5 text-center">bellow this you can see all users currently has access to the website </h4>
           <div class="">

             <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>PRODUCT NAME</th>
                 <th>PRODUCT PRICE</th>
                 <th>PRODUCT Image</th>
                </tr>
              </thead>

              <tbody>
              <?php

              $uname="root";
              $dbpass="";
              $host="localhost";
              $db="bahsstore";
              $connection= mysqli_connect("$host","$uname","$dbpass","$db");



              $sql = "SELECT * FROM `products`;";
              $res= $connection->  query($sql);
              if ($res-> num_rows>0) {
                while ($row = $res-> fetch_assoc()) {
                  echo "<tr>
                    <td>" . $row['id'] ."</td>
                    <td>". $row['product_name'] ."</td>
                    <td>". $row['product_price'] ."</td>
                    <td> <img style='width:120px; height:90px;'  src='/". $row['product_image'] . "'  /> </td>
                    <td>
                      <a href='' class='btn btn-primary'>update</a>
                      <a href='' class='btn btn-danger'>delete</a>
                    </td>
                  </tr>";
                };
              }else{
                echo "no result found";
              }
               ?>
              </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
     <!-- content-wrapper ends -->
   </div>
   <!-- page-body-wrapper ends -->
 </div>









 <?php include 'Footer.php'; ?>
