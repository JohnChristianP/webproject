<?php

require 'connection.php';

if(isset($_POST['action']) == 'order' && isset($_POST['action']) == 'order'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$products = $_POST['products'];
		$grand_total = $_POST['grand_total'];
		$address = $_POST['address'];
		$pmode = $_POST['pmode'];
		
		$data= '';

		
		$stmt=$conn->prepare("INSERT INTO orders(name,email,contact,address,pmode,products,amount_paid) VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("ssisssi",$name,$email,$phone,$address,$pmode,$products,$grand_total);
		$stmt->execute();
		$data.= '<div class="text-center">
					<h1 class="display-4 mt-2 text-danger">Thank You!!</h1>
					<h2 class="text-success">Your Order Placed Successfully!</h2>
					<h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h4>
					<h4>Your Name : '.$name.'</h4>
					<h4>Your E-Mail : '.$email.'</h4>
					<h4>Your Phone : '.$phone.'</h4>
					<h4>Total Amount Paid : '.number_format($grand_total,2).'</h4>
					<h4>Payment Mode : '.$pmode.'</h4>
					</div>';
				echo ($data);
	
					
	}
if (isset($_GET['cartItem'])&& isset($_GET['cartItem'])=='cart_item'){
 		$stmt=$conn->prepare("SELECT * FROM users_items");
 		$stmt->execute();
 		$stmt->store_result();
 		$rows=$stmt->num_rows;

 		echo $rows;
 	}
	?>