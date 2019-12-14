<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        
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
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>       
<div class="page-content page-container" id="page-content">
    <div class="padding">
         <div class="row container d-flex justify-content-center">
               <div class="col-md-6 text-center">
                        <h4 class="card-title">FOLLOW US AND SUBSCRIBE TO OUR SOCIAL MEDIA ACCOUNTS</h4>
                        <div class="template-demo"> <button type="button" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button> <button type="button" class="btn btn-social-icon btn-youtube"><i class="fa fa-youtube"></i></button> <button type="button" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button> <button type="button" class="btn btn-social-icon btn-dribbble"><i class="fa fa-dribbble"></i></button> <button type="button" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></button> <button type="button" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button> </div> 
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
