<?php
    require 'connection.php';
    session_start();
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
            <br><br><br>
           <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1><b>LOGIN</b></h1>
                                <form method="post" action="loginsub.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" pattern=".{6,}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                <div>Don't have an account yet? <a href="signup.php">Register</a></div>
                                </div>
                            </form>
                         </div>    
                    </div>
                </div>
           </div>
           <br><br><br><br><br><br><br><br><br><br><br>
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
