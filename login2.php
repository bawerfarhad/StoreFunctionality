<?php
include ("Header.php");
?>

<style media="screen">
  *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  .row{
    background: white;
    border-radius: 30px;
  }
  img{
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;

}
</style>

    <section class="Form">
        <div class="container my-5">
            <div class="row ">
                <div class="col-lg-5">
                    <img src="Picture\height4.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-7">
                    <form action="">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="email" class="form-control">
                            </div>
                        </div>
                    </form>

                    <form action="">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="password" class="form-control">

                            </div>
                        </div>
                    </form>

                    <form action="">
                        <div class="form-row ">
                            <div class="col-lg-7 ">
                                <button type="button" class="btn btn-success my-3">Login</button>
                            </div>
                        </div>
                        <a href="#">Forget Password?</a>
                        <p>Dont have an account? <a href="#"> Create one </a> </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
include ("Footer.php");
?>
