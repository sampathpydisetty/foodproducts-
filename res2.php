<!DOCTYPE html>
<html>
<head>
	<title>Italian</title>
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
	        <a class="nav-link" href="foods.html">Categories</a>
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
		<div id="message"></div>
		<div class="row mt-2 pb-3">
			<?php include 'server.php';
			$stmt= $db->prepare("SELECT * FROM r2");
			$stmt->execute();
			$result= $stmt->get_result();
			while($row= $result->fetch_assoc()):

			 ?>
			 <div class="col-sm-6 col-md-4 col-lg-3 mb-2" >
			 	<div class="card-deck" >
			 		<div class="card p-2 border-secondary mb-2">
			 			<img src="<?= $row ['item_image']?>" class="card-img-top" height="200">
			 			<div class="card-body p1" height="25">
			 				<h4 class="card-title text-center text-info"> <?= $row ['item_name']?></h4>
			 				<h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i> &nbsp &nbsp<?= number_format($row ['item_price'],2)?>/-</h5>
			 			</div>
			 			<div class="card-footer p-1">
			 				<form action="" class="form-submit">
			 					<div class="row p-2">
                  				<div class="col-md-6 py-1 pl-4">
                   					 <b>Quantity : </b>
                  				</div>
                  				<div class="col-md-6">
                    				<input type="number" class="form-control item_qty" value="<?= $row['item_qty'] ?>">
                  				</div>
               				 </div>

			 					<input type="hidden" class="item_id" value="<?= $row['id'] ?>">
			 					<input type="hidden" class="item_name" value="<?= $row['item_name'] ?>">
			 					<input type="hidden" class="item_price" value="<?= $row['item_price'] ?>">
			 					<input type="hidden" class="item_image" value="<?= $row['item_image'] ?>">
			 					<input type="hidden" class="item_code" value="<?= $row['item_code'] ?>">
			 				  <button class="btn btn-success btn-block addItemBtn" ><i class="fas fa-cart-plus"></i>&nbsp;&nbsp; Add to cart</button>
			 				</form>
			 				
			 			</div>
			 		</div>
			 	</div>
			 </div>
			<?php endwhile; ?>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".addItemBtn").click(function(e){
			

			e.preventDefault();
			var $form =$(this).closest(".form-submit");
			var item_id=$form.find(".item_id").val();
			var item_name=$form.find(".item_name").val();
			var item_price=$form.find(".item_price").val();
			var item_image=$form.find(".item_image").val();
			var item_code=$form.find(".item_code").val();
			var item_qty=$form.find(".item_qty").val();

			$.ajax({
				url:'action.php',
				method:'post',
				data:{item_id:item_id ,item_name:item_name ,item_price:item_price,item_qty:item_qty,item_image:item_image,item_code:item_code},
				success:function(response){

					window.scrollTo(0,0);
					$("#message").html(response);
					load_cart_item_number();
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