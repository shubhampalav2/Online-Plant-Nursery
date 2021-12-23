<?php include('includes/config.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="CSS/style.css"/>
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <span class="big-circle"></span>
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Online Plant Nursery Shop
          </p>

          <div class="info">
            <div class="information">
              <img src="images/location.png" class="icon" alt="" />
              <p>Me. Wagheshwari Mandir, Film City Road, Goregaon East, opp. Ratnagiri Hotel, Mumbai, Maharashtra 400063</p>
            </div>
            <div class="information">
              <img src="images/email.png" class="icon" alt="" />
              <p>plantsonline403@gmail.com</p>
            </div>
            <div class="information">
              <img src="images/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>
        <?php 
          if(isset($_POST['contactbtn'])){
            $username = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $mysqli->query("INSERT INTO `contact`(`username`, `email`, `phone`, `message`) VALUES ('$username','$email','$phone','$message')");
            if($mysqli->affected_rows>0) {
              $_SESSION['alert'] = "$username we got your message. We will get back to you soon.";
            }else{
              $_SESSION['alert'] = "Error: ".$mysqli->error;
            }
          }
        ?>
        <div class="contact-form">
          <img src="images/banner1.jpg">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" method="POST" autocomplete="off">
          <?php include 'includes/alert.php'; ?>
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" required="required" class="input" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" required="required" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" required="required" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" name="contactbtn" required="required" class="btn" />
          </form>
        </div>
      </div>
    </div>
    <script>
      const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});
    </script>
  </body>
</html>