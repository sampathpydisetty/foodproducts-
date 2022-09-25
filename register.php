<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/gif/png" href="https://i.pinimg.com/originals/50/3e/41/503e4105f6b488a056591bc8f0d473bc.jpg">
	<title>Join</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="regst.css" rel="stylesheet">
	
</head>
<script>
	function mail()
{
	var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	var phn = /^\d{10}$/;
	var ema = document.forms["f1"]["email"];
	var pas=document.forms["f1"]["Password"];
	var pho=document.forms["f1"]["mobile"];
	if (ema.value.match(validRegex)) {
            return true;
        }
	else{
          
        window.alert("Please enter a valid email address");
		ema.focus();
	}

	if(pas.value.match(passw))
	{
	  return true;
	}
	else{
		window.alert("Password should contain Must be atleast 6 digits and contain a speacial character and one number");
	}

	if(pho.value.match(phn))
	{
		return true;
	}
	else
	{
		windown.alert("Enter a valid phone number");
	}

}
</script>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
	<a class="navbar-brand text-primary font-weight-bold" href="#"><img src="https://i.pinimg.com/originals/50/3e/41/503e4105f6b488a056591bc8f0d473bc.jpg" height="40">YES</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="homepage.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/Foodies/login.php">Login</a>
			</li>
			
		</ul>
	</div>
</div>	
</nav>
<!-- End Navigation -->

<br><br>

<!--Join Us Form-->
<button type="button" class="btn btn-lg btn-block btn-outline-primary col-8 offset-2" data-toggle="collapse" data-target="#join"><h1 class="display-4">Register</h1><h1 class="display-4"> yourself today</h1></button>
  
<div id="join" class="collapse">
<div class="container">
<form action="register.php" method="post" id="join-us" name="f1"  onsubmit="return mail()">
	<?php include ('errors.php') ?>
	<div class="form-group row">
		<div class="col-8 offset-2">
		    <br><label for="name">Your Name</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Your name.." required><br>
			<label for="email">Email</label>
    			<input type="text" class="form-control" id="email" name="email" placeholder="Your email address.." required><br>
			<label for="password">Password</label>
			<input type="password" class="form-control" id="Password" name="password" placeholder="Choose a password.." required><br>
			<label for="password">Confirm Password</label>
			<input type="password" class="form-control" id="Password" name="confirmpassword" placeholder="Confirm Password" required><br>

			<label for="link">Mobile</label>

			<input type="text" class="form-control" id="link" name="mobile" placeholder="Your Mobile Number....." required><br>
			<button type="submit" name="signup" class="btn btn-primary btn-raised">Sign Up</button>
			<br>
			<a href="login.html" >Already have an account?</a>
		</div>
	</div>
</form>

</div>
</div>  
<!--End Join Us Form-->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!--- Footer -->
<footer>
<div class="container-fluid padding">
<div class="row text-center font-weight-bold">

<div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
	<hr class="light">
	<h5>Location</h5>
	<hr class="light">
	<p>Vishakapatnam</p>
</div>
<div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
	<hr class="light">
	<a class="logo text-light" href="#"><img src="https://i.pinimg.com/originals/50/3e/41/503e4105f6b488a056591bc8f0d473bc.jpg" height="25">YES</a>
	<hr class="light">
	<p><a href="#">info@Foodyes.com</a></p>
</div>
<div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
	<hr class="light">
	<h5>Contact Us</h5>
	<hr class="light">
	<p>Mobile: +91 9876543210</p>
	
</div>
<div class="col-12">
	<hr class="light-100">
	<h5>&copy; FoodYes pvt ltd</h5>
</div>

</div>
</div>
</footer>
<!--- End Footer -->

</body>
</html>
