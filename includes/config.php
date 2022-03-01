<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'plant');
if ($mysqli->connect_errno)
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;


function cart($type,$pid,$quantity){
	global $mysqli;
	if(isset($_SESSION['userid'])){
		$userid = $_SESSION['userid'];
		$chkcart = $mysqli->query("SELECT `id` FROM `cart` WHERE `type`='$type' AND `pid`='$pid' AND `user_id`='$userid'");
		if($chkcart->num_rows > 0){
			while ($data = $chkcart->fetch_assoc()) {
				$mysqli->query("UPDATE `cart` SET `quantity`=`quantity`+ $quantity WHERE `id`='".$data['id']."'");
			}
		}else{
			$mysqli->query("INSERT INTO `cart`(`type`, `pid`, `user_id`, `quantity`) VALUES ('$type','$pid','$userid','$quantity')");
		}
	}
}

if(isset($_POST['addcart'])){
	$name = $_POST['name'];
	$type = $_POST['type'];
	$pid = $_POST['id'];
	$quantity = 1;
	cart($type,$pid,$quantity);
	if($mysqli->affected_rows>0) {
	  $_SESSION['alert'] = "$name Added to your cart.";
	}else{
	  $_SESSION['alert'] = "Error: ".$mysqli->error;
	}
  }

?>
