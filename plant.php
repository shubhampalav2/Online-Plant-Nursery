<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Plant Nursery</title>
    <link rel="stylesheet" href="plant.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <style>
          nav{
	width: 100%;
	height: 75px;
	background-color: #45bf27;
	padding:0px 100px;
  border-radius:30px;
  border:5px solid green;
}
nav .logo{
	font-size: 30px;
	font-weight: bold;
	letter-spacing: 1.5px; 
}
nav .logo p{
	float: left;
	color:#fff;
	text-transform: uppercase;
}
nav ul{
	float: right;
}
nav ul li{
	display: inline-block;
	list-style: none;
}
nav ul li a{
	color:darkgreen;
	text-decoration: none;
	font-size: 18px;
	text-transform: uppercase;
	padding:0px 32px;
}
nav ul li a:hover{
	color:#c0d96f;
}
nav ul li .active{
	color:#c0d96f;
}
     footer {
  background: rgba(0, 0, 0, 0.815);
  overflow-x: hidden;
  padding: 14vmin 18vmin;
}

footer p > span {
  color: #ff512f;
}

footer input {
  border: none !important;
}

footer input::placeholder {
  color: white !important;
}

footer .input-group .input-group-text {
  background: linear-gradient(darkgreen, green);
  border: none;
}

footer .column i {
  color: darkgreen;
}

/* It is Adjacent sibling combinator */

footer .column i + i {
  padding: 0 0.5em;
}
/* Home Section Begin */
#home{
  display: flex;
  flex-direction: column;
  padding: 3px 200px;
  height: 760px;
  /* 773px */
  align-items: center;
  justify-content: center;
}

/* Now we set background */
/* We use psudo selector */
#home::before{
  content: "";
  background: url(images/plantbg.jpg) no-repeat center center/cover;
  position: absolute;
  height: 100%;
  width: 100%;
  z-index: -1;    /* Now content came up of strip{Power Of Z-Index} */
  opacity: 0.89;
}

#home h1{
  color: tomato;
  font-size: 2rem;
  padding: 4px;
}
#home h3{
  color: darkgreen;
  font-size: 1.75rem;
}
#home p{
  color: tomato;
  font-size: 1.5rem;
  padding: 4px;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

/* Smartphones (portrait and landscape) ----------- */
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {
/* Styles */
#home{
display: block;
}
}
 
/* Smartphones (landscape) ----------- */
@media only screen 
and (min-width : 321px) {
/* Styles */
}
 
/* Smartphones (portrait) ----------- */
@media only screen 
and (max-width : 320px) {
/* Styles */
}
 
/* iPads (portrait and landscape) ----------- */
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) {
/* Styles */
display:block;
}
 
/* iPads (landscape) ----------- */
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) 
and (orientation : landscape) {
/* Styles */
#home{
display:block;
}
}
 
/* iPads (portrait) ----------- */
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) 
and (orientation : portrait) {
/* Styles */
#home{
display:block;
}
}
 
/* Desktops and laptops ----------- */
@media only screen 
and (min-width : 1224px) {
/* Styles */
}
 
/* Large screens ----------- */
@media only screen 
and (min-width : 1824px) {
/* Styles */
}
 
/* iPhone 4 ----------- */
@media
only screen and (-webkit-min-device-pixel-ratio : 1.5),
only screen and (min-device-pixel-ratio : 1.5) {
/* Styles */
#home{
display:block;

}
}
  
}


    </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
crossorigin="anonymous">
</head>
<body>
  <a id="logo">
  <img src="images/logo.jpg" alt="">
  <span>Online Plant Nursery</span>
  </a>
<?php if(!isset($_SESSION['userid'])){ ?>
 <a style="text-decoration:none;" href="Login.php"'>
          <button style="  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 30px;" class="btn btn-light px-5 py-2 primary-btn">
                LOGIN
          </button>
        </a>&nbsp;&nbsp;
        <a href="register.php" style="border-radius: 30px;
   padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 30px;" class="btn btn-light px-5 py-2 primary-btn">
                SIGNUP
</a>&nbsp;&nbsp;
<?php }?>
<?php if(isset($_SESSION['userid'])){ ?>
<a href="logout.php" style=" padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 30px;" class="btn btn-light px-5 py-2 primary-btn">
  LOGOUT
</a>
<?php } ?>
  <?php
    if(isset($_SESSION['username'])){
      echo "Welcome ".$_SESSION['username'];
      unset($_SESSION['username']);
    }
  ?>
  <!-- <nav class="green" id="myTopnav"> -->
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <ul>
        <li><a href="#home" class="active">Home</a></li>
        <li><a href="#category">Category</a></li>
        <li><a href="#Product">Product</a></li>
        <li><a href="Contact.php">Contact</a></li>
        <li><a href="About.html">About</a></li>
        <li><form class="example" action="search.php" method="get" style="margin:auto;max-width:300px">
          <input type="text" placeholder="Search.." required="required" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form></li>
    </ul>
	</nav> -->

  <nav class="navbar navbar-expand-lg navbar-light bg-green">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#category">Category</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Contact.php">Contact</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#Product">Product</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="About.html">About</a>
      </li>
      <li class="nav-item active">
      <?php if(isset($_SESSION['userid'])){ ?><li><a href="carts.php">Cart</a></li><?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2" type="text" placeholder="Search.." required="required" name="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<!-- <div class="slider-box"> -->
    <!-- <div id="slider">
        <div class="content">
        <img src="images/slider1.jpg" alt="">
        <span>upto 70% off</span>
    </div>
    <div class="content">
        <img src="images/slider2.jpg" alt="">
        <span>upto 45% off</span>
    </div>
    <div class="content">
        <img src="images/slider3.jpg" alt="">
    </div>
    <div class="content"></div>
        <img src="https://media.istockphoto.com/photos/cypresses-plants-on-tree-farm-picture-id477721066?k=6&m=477721066&s=612x612&w=0&h=4-IpTPYY__1vwsNKlSb08mTR-oVbjvsy-ZvlM-foWNE=" alt="">
    </div>
    </div>
</div> -->
<!-- Section Begins -->
<section id="home">
        <h2 class="h-primary1">Welcome To Online Plant Nursery</h2>
        <h1>EXCITING OFFERS</h1>
        <h3>HAPPINESS IS TURNING YOUR </h3><h3> SPACE INTO GARDEN</h3>
        <p>Get upto 30% OFF</p>
    </section>
    <!-- category section starts  -->
    <section style="background:#ececf0;"class="category" id="category">

      <h1 style="text-align: center; font-size:28px;font-weight: bold;" class="heading" > Shop By Category </h1>

      <div class="row ml-5 ">
        <?php 
            $cate=$mysqli->query("SELECT * FROM `category`");
            foreach($cate as $row){
        ?>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-center mt-4" style="width: 65%;">
                <img src="images/<?= $row['image'] ?>" alt="" class="card-img-top">
                <div class="card-body">
                   <br>
                   <a style="color:red; text-decoration: none;" href="type1.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a> <br>  
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
     <!-- Featured Products Starts Here -->
    <section style="background:#dddddd;" class="Product" id="Product">
      <h1 style="text-align: center;">Products</h1>
      <?php include 'includes/alert.php'; ?>
      <div class="row ml-5 ">
        <?php 
            $plant = $mysqli->query("SELECT * FROM `products`");
            foreach($plant as $row){ 
        ?>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-center mt-4" style="width: 65%;">
                <img src="images/<?= $row['image'] ?>" alt="" class="card-img-top">
                <div class="card-body">
                  <form action="" method="POST">
                    <h3 style="font-size: 18px;"><?= $row['name'] ?></h3>
                    <div>Rs. <?= $row['price'] ?></div><br>
                    <div class="button">
                        <?php if(isset($_SESSION['userid'])){ ?>
                          <input type="hidden" name="name" value="<?= $row['name'] ?>">
                          <input type="hidden" name="type" value="products">
                          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                          <button type="submit" name="addcart" style="text-decoration: none; backgroud-color:black; color: white; border-radius: 25px;">Add to Cart</button>
                        <?php } ?>
                    </div> 
                  </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
    <!-- Featred Products Ends Here -->

   

       <!-- Subscribe Form Starts Here -->
       <div class="subscribe-form">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h1>Subscribe on Online Plant Nursery now!</h1>
              </div>
            </div>
            
            <div class="col-md-8 offset-md-2">
              <div class="main-content">
              <?php
                if(isset($_SESSION['alert1'])){
                  echo $_SESSION['alert1'];
                  unset($_SESSION['alert1']);
                }
              ?>
                <p>The Online Nursery Management System provides online real time information about the plants 
                    available in the nursery, plants sold, sales records, barcode handling and also estimates the best 
                    sales and best customer, and also handles most accounting systems also for employees.</p>
                <div class="container">
                  <form id="subscribe" action="" method="POST">
                    <div class="row">
                      <div class="col-md-7">
                      <?php 
                        if(isset($_POST['contactbtn'])){
                          $email = $_POST['email'];
                          $mysqli->query("INSERT INTO `subscribe`(`email`) VALUES ('$email')");
                          if($mysqli->affected_rows>0) {
                            $_SESSION['alert1'] = "$email Thanks for subscribing us.";
                          }else{
                            $_SESSION['alert1'] = "Error: ".$mysqli->error;
                          }
                        }
                      ?>
                        <fieldset>
                          <input name="email" type="text" class="form-control" id="email" 
                          onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                          onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                          value="Your Email...">
                        </fieldset>
                      </div>
                      <div class="col-md-5">
                        <fieldset>
                          <button type="submit" id="form-submit" name="contactbtn" class="button" class="btn">Subscribe Now!</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Subscribe Form Ends Here -->
      
<footer>
 <div class="col-md-2 col-sm-12">
          <h4 class="text-light">Follow Us</h4>
          <p class="text-muted">Let us be social</p>
          <div class="column text-light">
           <a href="#" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
              <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
            </svg>
          </a>&nbsp;
          <a href="#" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg>
          </a>&nbsp;
          <a href="#" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg>
          </a>&nbsp;
          <a href="#" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
          </a>
          </div>
        </div>
      </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>    
</body>
</html>