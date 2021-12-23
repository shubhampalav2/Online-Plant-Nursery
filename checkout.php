<?php include('includes/config.php') ?>
<?php if(!isset($_SESSION['userid'])){
    header('location:plant.php');
}?>
<?php
    if(isset($_POST['checkoutbtn'])){
      $cid = $_SESSION['userid'];
      $contact = $_POST['contact'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $pincode = $_POST['pincode'];
      $mysqli->query("INSERT INTO `orders`(`cid`, `contact`, `address`, `city`, `state`, `pincode`) VALUES ('$cid','$contact','$address','$city','$state','$pincode')");
      if($mysqli->affected_rows>0) {
        $_SESSION['alert'] = "Ordered Placed Successfully";
        $orderId = $mysqli->insert_id;
        $totalprice=0; $numProducts=0;
        $checkout = $mysqli->query("SELECT * FROM `cart` WHERE `quantity`>0 AND `user_id`='$cid'");
        foreach($checkout as $row){
            if($row['type']=='products'){
                $query = "SELECT * FROM `products` WHERE `id`='".$row['pid']."'";
            }elseif($row['type']=='plants'){
                $query = "SELECT * FROM `plants` WHERE `id`='".$row['pid']."'";
            }
            $checkout1 = $mysqli->query($query);
            foreach($checkout1 as $row1){
                $totalprice+=$row1['price']*$row['quantity'];
                $numProducts+=$row['quantity'];
                $mysqli->query("INSERT INTO `orderdetails`(`oid`, `type`, `pid`, `quantity`, `price`) VALUES ('$orderId','".$row['type']."','".$row['id']."','".$row['quantity']."','".$row1['price']*$row['quantity']."')");
                $mysqli->query("DELETE FROM `cart` WHERE `id`='".$row['id']."'");
              }
            }
            $mysqli->query("UPDATE `orders` SET `numOfProducts`='$numProducts',`Amount`='$totalprice' WHERE `id`='$orderId'");
      }else{
          $_SESSION['alert'] = " ".$mysqli->error;
      }
      header('location:payment.php');
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <form method="POST" class="container" action="#">
        <div class="form-row">
        </div>
        <div class="form-group">
          <label for="inputAddress">Mobile Number</label>
          <input type="text" name="contact" class="form-control" required="required" id="mobilenumber">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Address</label>
          <input type="text" name="address" class="form-control" required="required" id="inputAddress2">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" name="city" class="form-control" required="required" id="inputCity">
            <div class="invalid-feedback">
                Please provide a valid city.
              </div>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" name="state" class="form-control" required>
              <option selected>Choose...</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Goa">Goa</option>
              <option value="Punjab">Punjab</option>
              <option value="Tamil Nandu">Tamil Nandu</option>
              <option value="Delhi">Delhi</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh </option>
              <option value="Assam">Assam </option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Haryana">Haryana </option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Kerala">Kerala</option>
              <option value="Manipur">Manipur </option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Telangana">Telangana</option>
              <option value="Tripura">Tripura </option>
              <option value="Uttar Pradesh">Uttar Pradesh </option>
              <option value="Uttarakhand">Uttarakhand</option>
              <option value="West Bengal">West Bengal</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Andaman and Nicobar">Andaman and Nicobar</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Pin Code</label>
            <input type="text" name="pincode" class="form-control" required="required" id="inputZip">
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
            <button type="submit" name="checkoutbtn" style="  padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 30px;" class="btn btn-light px-5 py-2 primary-btn">
                 Buy Now  
            </button>
            <table border="1" class="table table-striped">
        <thead class="thead-dark">
            <th>Sr No</th>
            <th>Type</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
            <?php 
        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            $i=0; $totalprice=0;
            $cart = $mysqli->query("SELECT * FROM `cart` WHERE `quantity`>0 AND `user_id`='$userid'");
            foreach($cart as $row){
                if($row['type']=='products'){
                    $query = "SELECT * FROM `products` WHERE `id`='".$row['pid']."'";
                }elseif($row['type']=='plants'){
                    $query = "SELECT * FROM `plants` WHERE `id`='".$row['pid']."'";
                }
                $cart1 = $mysqli->query($query);
                foreach($cart1 as $row1){
                    $i++;
                    $totalprice+=$row1['price']*$row['quantity'];
        ?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $row['type'] ?>
                </td>
                <td><img src="images/<?= $row1['image'] ?>" height="70px" width="70px" alt="" class="">
                    <?= $row1['name'] ?>
                </td>
                <td>
                    <?= $row['quantity'] ?>
                </td>
                <td>Rs.
                    <?= $row1['price']*$row['quantity'] ?>
                </td>
            </tr>
            <?php }}} ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total Price</td>
                <td colspan="2">Rs. <?= $totalprice ?></td>
            </tr>
        </tfoot>
    </table>
      </form>   

</body>
</html>