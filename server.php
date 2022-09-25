<?php


// initializing variables
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'food_order');

// REGISTER USER
if (isset($_POST['signup'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['confirmpassword']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

  
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }else{

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $SELECT= "SELECT email FROM registration WHERE  email = ? LIMIT 1";
 // $INSERT = "INSERT Into registration (name, email,password,mobile) values(?, ?, ?, ?)";
  $stmt = $db->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->num_rows;





  if($rnum==0){
    $stmt->close();
  

    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO registration (name, email, password,mobile) 
          VALUES('$name', '$email', '$password' ,'$mobile')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    
    // $stmt = $db->prepare($INSERT);
    // $stmt->bind_param("sssi", $name, $email, $password,$mobile);
    // $stmt->execute();
  }else{
    array_push($errors,"someone already register using this email");
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

   $_SESSION['success'] = "You are now successfully registered";
    header('location: login.php');


  }
 }
}
// ... 
// LOGIN USER
if (isset($_POST['login'])) { 
  $email = $_POST['email'];
  $password_1= $_POST['password'];
    
    //  $INSERT = "INSERT Into login (email,password) values(?, ?)";
    //  $stmt = $db->prepare($INSERT);
    // $stmt->bind_param("ss", $email, $password_1);
    // $stmt->execute();
    $query = "SELECT * FROM registration WHERE email=? ";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
      $data = $stmt_result->fetch_assoc();
      if($data['password'] === md5($password_1)){
        $SESSION['name']=$name;
        header('Location: homepage.html');
      }else {
        array_push($errors, "Wrong username/password");
      }
    }else {
      array_push($errors, "Wrong username/password");
    }
}

// Cart Page

// if(isset($_POST['item_id'])){
//     $item_id=$_POST['item_id'];
//     $item_name=$_POST['item_name'];
//     $item_price=$_POST['item_price'];
//     $item_image=$_POST['item_image'];
//     $item_code=$_POST['item_code'];
//     $item_qty=1;


//     $stmt =$db->prepare("SELECT item_code FROM cart WHERE item_code=?");
//     $stmt->bind_param("s",$item_code);
//     $stmt->execute();
//     $res=$stmt->get_result();
//     $r=$res->fetch_assoc();
//     $code=$r['item_code'];

//     if(!$code){
//       $query=$db->prepare("INSERT INTO cart(item_name,item_price,item_image,qty,total_price,item_code) VALUES(?,?,?,?,?,?)");
//       $query->bind_param("sssiss",$item_name,$item_price,$item_image,$qty,$item_price,$item_code);
//       $query->execute();
//       echo '<div class="alert alert-success alert-dismissible">
//         <button type="button" class="close" data-dismiss="alert">&times;</button>
//         <strong>Item added to your Cart!</strong>
//       </div>' ;
//     }
//     else{
//       echo '<div class="alert alert-success alert-dismissible">
//         <button type="button" class="close" data-dismiss="alert">&times;</button>
//         <strong>Item has already been added to your Cart!</strong>
//       </div>' ;
//     }
//   }