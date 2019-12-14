<?php 

require 'connection.php';
session_start();
if(!isset($_SESSION['email'])){
        header('location: login.php');
    }


	$allitems = '';
	$prod=array();
	$id = $_GET['id'];
	$query = "select * from users where id = '$id'";
	$query2 = mysqli_query($con,$query);
	$row = mysqli_fetch_array($query2);
	if($row == true){
		$name = $row['name'];
		$contact = $row['contact'];
		$add = $row['city'];
		$email = $row['email'];
	}
	$products = "select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$id'";
    $userproducts = mysqli_query($con,$products) or die(mysqli_error($con));
    $noproducts = mysqli_num_rows($userproducts);
    $sum=0;
    if($noproducts==0){
 
    }else{
        while($row=mysqli_fetch_array($userproducts)){
            $sum=$sum+$row['price']; 
            $prod[]=$row['name'];
            $allitems= implode(", ", $prod);
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

			<div class="container container-center">
				<div class="row justify-content-center">
					<div class="col-lg-6 px-4 pb-4" id="order">
						<h4 style="font-size: 30px; text-align: center; "><b>Complete your order!</b></h4>
						<div class="jumbotron p-3 mb-2 text-center">
						<h6 class="lead"><b>product(s) : </b><?= $allitems; ?></h6>
						<h6 class="lead"><b>Delivery Charge : </b>Free</h6>
						<h5 style="font-size: 20px"><b>Total Amount Payable :  </b><?= number_format($sum,2) ?></h5>
						</div>
						<h1><?echo '$id';?></h1>
						<form action="" method ="post" id="placeOrder">
						<input type="hidden" name="products" value="<?= $prod; ?>">
						<input type="hidden" name="grand_total" value="<?= $sum; ?>">
						<div class="form-group">
						<input type="text" name="name" class="form-control" value="<?=$name;?>">
						</div>
						<div class="form-group">
						<input type="email" name="email" class="form-control" value="<?=$email;?>">
						</div>
						<div class="form-group">
						<input type="tel" name="phone" class="form-control" value="<?=$contact;?>">
						</div>
						<div class="form-group">
						<textarea name="address" class="form-control" value="<?=$add;?>"></textarea>
						</div>
						<h6 class="text-center lead">Select Payment Mode</h6>
						<div class="form-group">
							<select name="pmode" class="form-control">
							<option value="" selected disabled>-Select Payment Mode-</option>
							<option value="cod">Cash On Delivery</option>
							<option value="netbanking">Net Banking</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
						</div>
						</form>
					</div>
				</div>
			</div>

			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

			<!-- Popper JS -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			<script type="text/javascript">


				$(document).ready(function(){
					
					$("#placeOrder").submit(function(e){
						e.preventDefault();
						$.ajax({
							url: 'action.php',
							method: 'post',
							data: $('form').serialize()+"&action=order",
							success: function(response){
								$("#order").html(response);
							}
						});
					});
					
					load_cart_item_number();

					function load_cart_item_number(){

						$.ajax({
							url: 'action.php',
							method:'GET',
							data: { cartItem:"cart_item"},
							success:function(response){
								$("#cart-item").html(response);
							}
						});
					}

				});


			</script>
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

