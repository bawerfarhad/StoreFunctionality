<?php
    session_start();
    include 'Header.php';
    include 'Functions/functions.php';
    include 'Functions/CreateDb.php';
    // include 'home.php';
    $total=0;
$count=0;


    $db= new CreateDb('bahsstore','products');

    if(isset($_POST['remove'])){
        if($_GET['action']=='remove'){
            foreach ($_SESSION['card'] as $key  =>$value) {
                if ($value['product_id']==$_GET['id']){
                    unset($_SESSION['card'][$key]);
                    echo "<script> alert('product has been removed') </script>";
                    $db= new CreateDb('bahsstore','products');

                    if(isset($_POST['remove'])){
                        if($_GET['action']=='remove'){
                            foreach ($_SESSION['card'] as $key  =>$value) {
                                if ($value['product_id']==$_GET['id']){
                                    unset($_SESSION['card'][$key]);
                                    echo "<script> alert('product has been removed') </script>";
                                    echo "<script> window.location='mycard.php' </script>";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>

    <div class="container-fluid my-5">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shoping-cart ">
                    <h6>My Card</h6>
                    <hr>
                    <?php

                        if(isset($_SESSION['card'])){
                        $product_id=array_column($_SESSION['card'],'product_id');
                        $result= $db->getData();
                        while($row=mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id) {
                                if($row["id"]==$id){
                                    cartElement($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
                                    $total+=(int)$row['product_price'];
                                    }
                                }
                            }
                        }else{
                            echo '<h2> card is empty</h2>  ';
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-4    offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4 ">
                    <h5> Card Details</h5>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                if (isset($_SESSION['card'])){
                                    $count=count($_SESSION['card']);
                                    echo "<h5>total Price of: </h5>";

                                }else{
                                    echo '<h3>Price (0 items)</h3>';
                                }
                            ?>
                        </div>

                        <div class="col-md-6 ">
                          <?php ($count >0)? $count:$count=0;
                          ($total>0) ?$total: $total=0;
                          ?>
                                <h4><?php echo "($count items) =$total";?>$</h4>
                            <form action="order.php" method="get">
                                <input type="hidden" name="varname" value=<?php $total ?>>
                                <?php $_SESSION['total_p'] = $total; ?>
                                <button type="submit" name="submit" class="btn btn-success my-3 " > Submit order </button>
                                <button type="reset" onclick="clear_sessions()" name="clean" class="btn btn-danger my-3 " > clean card </button>

                                  <script type="text/javascript">
                                      function clear_sessions(){
                                        sessionStorage. clear();
                                      }
                                  </script>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php include 'Footer.php';?>
