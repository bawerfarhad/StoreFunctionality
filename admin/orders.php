<?php

include 'Header.php';
include '../db-connection.php';

?>






<div class="my-5">
  <h4 class="my-5 text-center">bellow this you can see all orders currently wont to buy on the website </h4>
  <div class="">

    <table class="table px-5 my-3">
     <thead>
       <tr>
         <th>ID</th>
         <th>User Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>phone number</th>
        <th>total price</th>
        <th>date</th>
       </tr>
     </thead>

     <tbody>
     <?php

     $uname="root";
     $dbpass="";
     $host="localhost";
     $db="bahsstore";
     $connection= mysqli_connect("$host","$uname","$dbpass","$db");



     $sql = "SELECT * FROM `orders`;";
     $res= $connection->  query($sql);
     if ($res-> num_rows>0) {
       while ($row = $res-> fetch_assoc()) {
         echo "<tr>
           <td>" . $row['id'] ."</td>
           <td>". $row['username'] ."</td>
           <td>". $row['email'] ."</td>
           <td>". $row['address'] ."</td>
           <td>". $row['phone_number'] ."</td>
           <td>". $row['total_price'] ."</td>
           <td>". $row['date'] ."</td>

           <td>
             <a href='' class='btn btn-primary'>Done</a>

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









 <?php include 'Footer.php'; ?>
