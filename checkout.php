<?php 
	require 'server.php';

	$grand_total =0;
	$allItems ='';
	$items= array();

	$sql ="SELECT CONCAT(item_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt=$db->prepare($sql);
	$stmt->execute();
	$result=$stmt->get_result();
	while($row=$result->fetch_assoc()){
		$grand_total += $row['total_price'];
		$items[]=$row['ItemQty'];

	}

	$allItems= implode(", ", $items);
	
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Check out</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark pd-8">
  <!-- Brand -->
	  <a class="navbar-brand" href="homepage.html"><i class="fas fa-pizza-slice"></i>&nbsp FoodYes</a>

	  <!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Navbar links -->
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link active" href="res1.php">Items</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Categories</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="checkout.php">Check out</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>  <span id="cart_item" class="badge badge-danger"></span></a>
	      </li>
	    </ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row justify-content-center">
			<div class="clo-lg-6 px-4 pb-4" id="order">
				<h4 class="text-center text-success p-2 ">Your Order</h4>
				<button type="button" class="btn btn-lg btn-block btn-outline-info  " data-toggle="collapse" data-target="#order">View Order</button><br>
				<div id="order" class="collapse">
				<div class="jumbotron p-3 mb-2 text-center">
					<h6 class="lead"><b>ordered Items : </b><?= $allItems;?></h6>
					<h6 class="lead"><b>Total Amount : </b><?= number_format($grand_total,2)?>/-</h6>
				</div>
				</div>
				<button type="button" class="btn btn-lg btn-block btn-outline-info " data-toggle="collapse" data-target="#details">Please Enter the Details</button><br>

				<div id="details" class="collapse">
				<form action="" method="post" id="placeOrder" >
					<input type="hidden" name="items" value="<?= $allItems; ?>">
					<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Enter Name" >
					</div>	
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Enter Email" >
					</div>	
					<div class="form-group">
						<input type="tel" name="phone" class="form-control" placeholder="Enter Phone number" >
					</div>	
					<div class="form-group">
						<textarea name="address" class="frm form-control" rows="3" cols="10" placeholder="Enter Delivery Address...."></textarea>
					</div>
					<h6 class="text-center lead">Select Payment Mode</h6>
					<div class="form-group">
						<select name="mode" class="form-control">
							<option value="" selected disabled>---Select---</option>
							<option value="COD">Cash on Delivery</option>
							<option value="netbanking">Net Banking</option>
							<option value="cards">Credit/Debit cards</option>
						</select>
					</div>
					<div class="form-group ">
						
						
						<input type="submit" name="submit" value="place Order" class="btn btn-danger btn-lg btn-block">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#placeOrder").submit(function(e){
			e.preventDefault();
			$.ajax({
				url:'action.php',
				method:'post',
				data: $('form').serialize()+"&action=order",
				success: function(response){
					$("#order").html(response);
				}
			});
		});


		load_cart_item_number();


		function load_cart_item_number(){
			$.ajax({
				url:'action.php',
				method:'get',
				data:{cartItem:"cart_item"},
				success:function(response){
					$("#cart_item").html(response);
				}
			});
		}
	});
</script>
</body>
</html>