<?php

include 'Header.php';
include '../db-connection.php';




    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bahsstore";


    if (isset($_POST['create'])) {

      $uname=$_POST['uname'];
      $password=$_POST['password'];
      $email=$_POST['email'];



    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO `users`(`id`, `username`, `password`, `email`) VALUES (null,'$uname','$password','$email');";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";
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
             <h4>Create an account to a users</h4>
             <h6 class="font-weight-light">please fill this form to create an acoount to new users</h6>


             <form class="pt-3" method="POST" action="users.php">
               <div class="form-group">
                 <input type="email" name="email" id="email" class="form-control form-control-lg my-2" placeholder="Email">
               </div>

               <div class="form-group">
                 <input type="text" name="uname" id="uname" class="form-control form-control-lg my-2"  placeholder="User name">
               </div>

               <div class="form-group">
                 <input type="password" name="password" id="password"  class="form-control form-control-lg" placeholder="Password">
               </div>
               <div class="mb-4">

               </div>
               <div class="mt-3">
                 <input type="submit" name="create" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Create new account"/>
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
                  <th>User Name</th>
                 <th>Email</th>
                 <th>Actions</th>
                </tr>
              </thead>

              <tbody>
              <?php

              $uname="root";
              $dbpass="";
              $host="localhost";
              $db="bahsstore";
              $connection= mysqli_connect("$host","$uname","$dbpass","$db");



              $sql = "SELECT * FROM `users`;";
              $res= $connection->  query($sql);
              if ($res-> num_rows>0) {
                while ($row = $res-> fetch_assoc()) {
                  echo "<tr>
                    <td>" . $row['id'] ."</td>
                    <td>". $row['username'] ."</td>
                    <td>". $row['email'] ."</td>
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
