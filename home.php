<?php
    session_start();
    include 'Header.php';
    include 'Functions/functions.php';
    include 'Functions/CreateDb.php';
    

    $Database= new CreateDb('BahsStore','Products');

    if(isset($_POST['add'])){
        if(isset($_SESSION['card'])){


            $item_array_id=array_column($_SESSION['card'],"product_id");

            if(in_array($_POST['product_id'],$item_array_id)){
                echo "<script> alert('product added to the card')  </script> ";
                echo "<script> window.location='index.php'</script> ";
            }else{
                $count=count($_SESSION['card']);
                $item_array=array(
                    "product_id"=> $_POST['product_id']
                );
                $_SESSION['card'][$count]=$item_array;

            }



        }else{
            $item_array=array(
                    "product_id"=> $_POST['product_id']
            );
            $_SESSION['card'][0]=$item_array;
            print_r($_SESSION['card']);
        }
    }
?>
<div class="container">
    <div class="row py-5">
        <?php
        $result=$Database->getData();
        while($row=mysqli_fetch_assoc($result)){
        component($row['product_name'], $row['product_price'],$row['product_image'],$row['id']);
            }
        ?>
    </div>
</div>

 <?php  include 'Footer.php'; ?>
