<?php 
	session_start();
	
	require 'server.php';
	if(isset($_POST['item_id'])){
		$item_id=$_POST['item_id'];
		$item_name=$_POST['item_name'];
		$item_price=$_POST['item_price'];
		$item_image=$_POST['item_image'];
		$item_code=$_POST['item_code'];
		$item_qty=$_POST['item_qty'];
		$total_price=$item_price * $item_qty;


		$stmt =$db->prepare("SELECT item_code FROM cart WHERE item_code=?");
		$stmt->bind_param("s",$item_code);
		$stmt->execute();
		$res=$stmt->get_result();
		$r=$res->fetch_assoc();
		$code=$r['item_code']??'';

		if(!$code){
			$query=$db->prepare('INSERT INTO cart (item_name,item_price,item_image,qty,total_price,item_code) VALUES(?,?,?,?,?,?)');
			$query->bind_param("ssssss",$item_name,$item_price,$item_image,$item_qty,$total_price,$item_code);
			$query->execute();
			echo '<div class="alert alert-success alert-dismissible mt-3 mb-2">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Item added to your Cart!</strong>
			</div>'	;
		}
		else{
			echo '<div class="alert alert-warning alert-dismissible mt-3 md-2">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>This Item has already been added to your Cart!</strong>
			</div>'	;
		}
	}
	
	if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item'){
		$stmt=$db->prepare("SELECT * FROM cart");
		$stmt->execute();
		$stmt->store_result();
		$rows=$stmt->num_rows;

		echo $rows;
	}

	if (isset($_GET['remove'])) {

		$id=$_GET['remove'];

		$stmt=$db->prepare("DELETE FROM cart WHERE id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();

		$_SESSION['showAlert']='block';
		$_SESSION['message']='This Item has been removed from the cart!';
		header('location:cart.php');
	}

	if(isset($_GET['clear'])){
		$stmt=$db->prepare("DELETE FROM cart");
		$stmt->execute();
		header('location:cart.php');
		$_SESSION['showAlert']='block';
		$_SESSION['message']='All the Items have been removed from the cart!';
		header('location:cart.php');
	}


	if(isset($_POST['qty'])){
		$qty = $_POST['qty'];
		$item_id=$_POST['item_id'];
		$item_price=$_POST['item_price'];

		$total_price=$qty*$item_price;
		$stmt=$db->prepare("UPDATE cart SET qty=?,total_price=? WHERE id=?");
		$stmt->bind_param("isi",$qty,$total_price,$item_id);
		$stmt->execute();


	 }

	 if(isset($_POST['action']) && isset($_POST['action'])== 'orders'){
	 	$name=$_POST['name'];
	 	$email=$_POST['email'];
	 	$phone=$_POST['phone'];
	 	$items=$_POST['items'];
	 	$grand_total=$_POST['grand_total'];
	 	$address=$_POST['address'];
	 	$mode=$_POST['mode']??'';

	 	$data='';

	 	$stmt=$db->prepare("INSERT INTO orders(name,email,phone,address,mode,items,amount_paid) VALUES(?,?,?,?,?,?,?)");
	 	$stmt->bind_param("sssssss",$name,$email,$phone,$address,$mode,$items,$grand_total);
	 	$stmt->execute();
	 	$data .='<div class="text-center">
	 				<h1 class="display-4 mt-2 text-info"><b>Thank You</b></h1>
	 				<h2 class="text-success">Your Order has been placed Successfully</h2>
	 				<h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$items.'</h4>
	 				<h4>Total Amount Paid : '.number_format($grand_total,2).'/-</h4><br><br>
	 				<h2 class="text-primary">Keep ordering for amazing foods</h2>
	 				
	 				</div>';

	 	echo $data;

	 }

	 ?>	
