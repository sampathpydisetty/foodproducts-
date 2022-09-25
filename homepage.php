
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">

</head>
<body>
  <div class="header-background">
      <div id="nav" class="sticky-nav">

            <nav class="navbar navbar-expand-lg ">
      <div class="container">
       <img src="logo.png" class="logoimg">
        <a class="navbar-brand" href="#">FoodYes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span></span>
          <span></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus">About us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Get into
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="http://localhost/Foodies/login.php">Login</a></li>
                <li><a class="dropdown-item" href="http://localhost/Foodies/register.php">Register</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="homepage.php">Logout</a></li>
              </ul>



            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Service
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                <li><a class="dropdown-item" href="login.php">Foods</a></li>
                <li><a class="dropdown-item" href="login.php">Book Table</a></li>

              </ul>



            </li>

            <li class="nav-item">
              <a class="nav-link" href="#contactus">Contact us</a>
            </li>



          </ul>
          <form class="d-flex" action="login.php">

            <button class="btn btn-outline-success" type="submit"  >Get Started</button>
          </form>
        </div>
      </div>
    </nav>

      </div>


    </div>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="food1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Blueberry Pancake Icecream</h3>
        <h4>Good Food Is a Good Mood.</h4>
      </div>
    </div>
    <div class="carousel-item">
      <img src="fd2.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Pizza!</h3>
        <h4>There is no WE in food.</h4>
      </div>
    </div>
    <div class="carousel-item">
      <img src="fd3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Burgers</h3>
        <h4>The belly rules the mind,so does burgers!</h4>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script>

function send() {
var link = 'mailto:sriharsha7102k@gmail.com?subject=Message from '
+document.getElementById('email').value
+'&body='+document.getElementById('text-area').value;
window.location.href = link;
}
</script>



    <section class="categories ">
      <div class="container1">
        <h2 class="text-center">Explore Foods</h2>
          <a href="#">
          <div class="box-3 float-container">
            <img src="images/pizza.jpg" alt="pizza" class="img-responsive img-curve">
            <h3 class="float-text text-white">Pizzas</h3>
          </div></a>
            <a href="#">
          <div class="box-3 float-container">
            <img src="images/burgers.jpg" alt="burgers" class="img-responsive img-curve">
            <h3 class="float-text text-white">Burgers</h3>
          </div></a>
            <a href="#">
          <div class="box-3 float-container">
            <img src="images/biriyani.jpg"  alt="biriyani" class="img-responsive img-curve"> 
            <h3 class="float-text text-white">Biriyanis</h3>
          </div></a>
          <a href="#">

          <div class="box-3 float-container">
            <img src="images/cakes.jpg" alt="cakes" class="img-responsive img-curve">
            <h3 class="float-text text-white">Cakes</h3>
          </div></a>
          <a href="#">

          <div class="box-3 float-container">
            <img src="images/shakes.jpg" alt="shakes" class="img-responsive img-curve">
            <h3 class="float-text text-white">Shakes</h3>
          </div></a>
          <a href="#">

          <div class="box-3 float-container">
            <img src="images/icecream.jpg" alt="icecream" class="img-responsive img-curve">
            <h3 class="float-text text-white">Ice Creams</h3>
          </div></a>
          <div class="clearfix">

          </div>
      </div>
    </section>




   <div class="container-fluid " id="aboutus">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-6 column-left">

        </div>
        <div class="col-xs-12 col-sm-6 col-lg-6 column-right">
          <h1 class="section-title">About us</h1>
          <p class="paragraph">Launched in Visakhapatnam, FoodYes has grown from a home project to one of the largest food aggregators in the city.Enabling our vision of better food for more people. We not only connect people to food in every context but work closely with restaurants to enable a sustainable ecosystem.
An all around lovely and clean-cut website for all of your recipe desires. Find collections based on meals, in addition to snack beverages and more.

            We serve with LOVE ❤</p>
        </div>
      </div>
    </div>
<br> 
    <div class="container-fluid " id="contactus">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-12 contact-left ">
          <div class="text-left-block">
            <div class="left-center-text">
              <div class="left-center-part">
                <h2 class="contact-section">Get in touch</h2>
                <p class="paragraph">We are here to help you <strong>Mon to Fri </strong>from 9:00AM to 5:00PM <br>Contact us via <strong>Phone : </strong>
                <a href="#" class="phone-mail-link">9848032919</a>or <strong>Email</strong>: <a href="#" class="phone-mail-link">Foodyes@gmail.com</a></p>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 lg-6">
                    <form id="contact-form" name="contact-form" action="index.html" data-name="Contact form" method="post">
                      <div class="row">

                        <div class="col-xs-12 col-sm-6 col-lg-12">
                          <div class="form-group">
                            <input type="text" id="name" name="name" class="form form-control" placeholder="Name" data-name="Name" required value="">
                          </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-lg-12">
                          <div class="form-group">
                            <input type="email" id="email" name="email" class="form form-control" placeholder="Email address" data-name="Email Address" required value="">
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-6 col-lg-12">
                        <div class="form-group">
                          <input type="text" id="company" name="company" class="form form-control" placeholder="Phone number" data-name="Company" >
                        </div>
                      </div>
                    </div>

                  <div class="col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                      <textarea id="text-area" class="form textarea form-control" placeholder="   Your message here..." name="message" data-name="Text Area"  required rows="5" cols="20"></textarea>
                    </div><br>
                  </div>

                </div><br>
                    <button onclick="send()" type="submit" id="valid-form" class="btn btn-color" name="button">Send Message</button><br><br>
                    </form>
                  </div>
                 
                </div>



              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-lg-6  column-right contact-right">

        </div>
      </div>

    </div>

    <section class="social" id="footer">
      <div class="container text-center ">
        <h3 class="paragraph" style="margin-top: 10px;">Follow us on</h3>
          <ul>
            <li>
              <a href="#"><img src="https://img.icons8.com/color/96/000000/facebook-new.png"/></a>
            </li>
            <li>
              <a href="#"><img src="https://img.icons8.com/color/96/000000/instagram-new--v1.png"/></a>
            </li>
            <li>
              <a href="#"><img src="https://img.icons8.com/color/96/000000/twitter--v1.png"/></a>
            </li>
          </ul>
          <p class="paragraph">Order  delicious food on the go, anywhere, anytime. FoodYes is happy to assist you with your home delivery. Every time you order, you get a hot and fresh food delivered at your doorstep in less than thirty minutes. *T&C Apply.
Hurry up and place your order now!</p>
<br><br>
        <p class="paragraph">All rights designed by <strong>FoodYes © 2021</strong> </p>  <br><br>

      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>


</body>
</html> 
