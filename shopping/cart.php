<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    $user_id=$_SESSION['id'];
    $user_products_query="select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['price']; 
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CompuClinic Enterprise</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php 
               require 'header.php';
            ?>
            <br>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr style="background-color: #b3ffb3; font-style: bold; font-size: 17px;">
                            <th>Item No.</th><th>Name</th><th>Price</th><th></th>
                        </tr>
                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           
                         ?>
                        <tr>
                            <th><?php echo $counter ?></th><th><?php echo $row['name']?></th><th><?php echo $row['price']?></th>
                            <th><a class="text-danger"href='cart_remove.php?id=<?php echo $row['id'] ?>'>Remove</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                        <tr>
                            <th></th><th>Total</th><th style="background-color:  #b3ffb3; text-align: center; font-size: 23px; text-decoration-line: underline"> ₱ <?php echo $sum;?></th><th><a href="checkout.php?id=<?php echo $user_id?>" class="btn btn-primary">Checkout</a></th>
                        </tr>
                    </tbody> 
                </table>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <footer>       
<div class="page-content page-container" id="page-content">
    <div class="padding">
         <div class="row container d-flex justify-content-center">
               <div class="col-md-6 text-center">
                        <h4 class="card-title">FOLLOW US AND SUBSCRIBE TO OUR SOCIAL MEDIA ACCOUNTS</h4>
                        <div class="template-demo"> <button type="button" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button> <button type="button" class="btn btn-social-icon btn-youtube"><i class="fa fa-youtube"></i></button> <button type="button" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button> <button type="button" class="btn btn-social-icon btn-dribble"><i class="fa fa-dribble"></i></button> <button type="button" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></button> <button type="button" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button> </div> 
                         <hr class="clearfix w-100 d-md-none pb-3 a">
                         <div class="col-md-6 mb-md-0 mt-3">
                        <h5 class="text-uppercase font-weight-bold">ABOUT</h5>
                        <p>A computer is a machine or device that performs processes, calculations and operations based on instructions provided by a software or hardware program. It is designed to execute applications and provides a variety of solutions by combining integrated hardware and software components.</p>
                        </div>            
                    </div>
            </div>
    </div>
</div>
  <center>
    <div class="footer-copyright text-center py-3">
      <p>CompuClinic<a href="https://google.com"></a></p>
        <p>All Rights Reserved.</p>
           </div>
         </center>
        </div>
       </footer>
        </div>
    </body>
</html>
