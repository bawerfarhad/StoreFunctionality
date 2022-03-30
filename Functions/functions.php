<?php

function Component($title,$price ,$img,$id){
$path="admin/".$img;
$element="
            <div class=\"col-md-3 py-3 col-sm-6 my-3 my-md-0\">
            <form action=\"home.php\" method=\"post\">
                <div class=\"card shadow\">
                    <div class=\"\">
                        <img src=$img class=\"img-fluid card-img-top\" alt=\"\">
                    </div>
                    <div class=\"card-body\">
                        <div class=\"card-title\">$title</div>
                        <h6>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                        </h6>
                        <h5>
                            <small>
                                <s class=\"text-secondary \">15$</s>
                                <span class=\"price\">$price $</span>
                            </small>
                        </h5>

                        <button class=\"btn btn-success mx-5\" type=\"submit\" name=\"add\"> Add to card <i class=\"fas fa-shopping-cart \"></i> </button>
                           <input type='hidden' name='product_id' value=$id>
                    </div>
                </div>
            </form>
        </div>



";

    echo $element;
}



function cartElement($product_name,$product_price ,$product_img,$product_id){
    $element="


                        <form action=\"mycard.php?action=remove&id=$product_id \" method=\"post\" class=\"cart-items my-4\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3\">
                                    <img src=$product_img alt=\"\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$product_name</h5>
                                    <small class=\"text-secondary\">seller: me</small>
                                    <h5 class=\"pt-2\">$product_price $</h5>
                                    <button class=\"btn btn-danger mx-5\" name=\"remove\" type=\"submit\">Remove</button>
                                </div>
                                <div class=\"col-md-3\">

                                </div>
                            </div>
                        </div>
                    </form>



    ";
    echo $element;
}
