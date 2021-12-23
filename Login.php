<?php include 'includes/config.php';
if(isset($_SESSION['userid'])){
  header('location:plant.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</style>
</head>
<body>
<div class="header">
  	<h2>Login</h2>
  </div>
	<?php
  if(isset($_POST['log_user'])){
    $email = $_POST['username'];
    $password = $_POST['password'];
    $user = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
    if($user->num_rows > 0){
      while ($data = $user->fetch_assoc()) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['userid'] = $data['id'];
      }
      header('location:plant.php');
      exit();
    }else{
      $_SESSION['alert'] = "Credential didn't match. Try again";
    }
  }
  ?>
  <form method="post" action="">
  <?php include 'includes/alert.php'; ?>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" required="required" name="username" value="">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" required="required" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="log_user">LOGIN</button>
  	</div>
  </form>
</body>
</html>