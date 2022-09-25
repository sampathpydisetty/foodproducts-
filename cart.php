<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark pd-8">
  <!-- Brand -->
	  <a class="navbar-brand" href="homepage.html"><i class="fas fa-pizza-slice"></i>&nbsp &nbsp Foodies</a>

	  <!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Navbar links -->
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	    <ul class="navbar-nav ml-auto">
	      
	      <li class="nav-item">
	        <a class="nav-link" href="Foods.php">Categories</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="checkout.php">Check out</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i>  <span id="cart_item" class="badge badge-danger"></span></a>
	      </li>
	    </ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row justify-content-center">
			
				<div class="table-responsive mt-2">
					<table class="table table-bordered table-striped text-center">
						<thead>
							<tr>
							<td colspan="7">
								<h4 class="text-center tect-info m-0">Items in your cart!</h4>
							</td>
						</tr>
						<tr>
							<th>ID</th>
							<th>Image</th>
							<th>Item</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total Price</th>
							<th>
								<a href="action.php?clear=all" class="badge-danger badge p-2" onclick="return confirm('Are you sure that you want to clear all your cart items? ')"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
							</th>
						</tr>
						</thead>
						<tbody>
							<?php 
								require 'server.php';
								$stmt =$db->prepare("SELECT * FROM cart");
								$stmt->execute();
								$result =$stmt->get_result();
								$grand_total=0;
								while ($row=$result->fetch_assoc()): 
							 ?>
							 <tr>
							 	<td><?= $row['id']?></td>
							 	<input type="hidden" class="item_id" value="<?= $row['id']?>" name="">
							 	<td><img src="<?= $row['item_image']?>" width="100"></td>
							 	<td style=" font-weight: bold; font-size: 20px;"><?= $row['item_name']?></td>
							 	<td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?=number_format($row['item_price'],2);?></td>

							 	<input type="hidden" class="item_price" value="<?= $row['item_price']?>" name="">

							 	<td><input type="number" class=" form-control itemQty " value="<?= $row['qty']?>" style="width: 75px" name=""></td>
							 	<td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?=number_format($row['total_price'],2);?></td>
							 	<td>
							 		<a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sue that you want to remove this item?')"><i class="fas fa-trash-alt"></i></a>
							 	</td>
							 </tr>
							 <?php $grand_total +=$row['total_price']; ?>
							<?php endwhile; ?>
							<tr>
								<td colspan="3">
									<a href="Foods.php" class="btn btn-info"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Continue Picking</a>
								</td>
								<td colspan="2"><b>Grand Total</b></td>
								<td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?=number_format($grand_total,2);?></b></td>
								<td>
									<a href="checkout.php" class="btn btn-success <?= ($grand_total >1)?"":"disabled"; ?>" ><i class="fas fa-credit-card"></i>&nbsp;&nbsp;Check Out</a>
								</td>
							</tr>
						</tbody>
					</table>
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

		$(".itemQty").on('change', function(){
			var $el=$(this).closest('tr');

			var item_id= $el.find(".item_id").val();
			var item_price=$el.find(".item_price").val();
			var qty=$el.find(".itemQty").val();
			console.log(qty);
			location.reload(true);
			$.ajax({
				url:'action.php',
				method:'post',
				cache:false,
				data:{qty:qty,item_id:item_id,item_price:item_price},
				success:function(response){
					console.log(response);
				}
			})


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