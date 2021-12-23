<?php include('includes/config.php') ?>
<?php if(!isset($_SESSION['userid'])){
    header('location:plant.php');
}?>
<?php
if(isset($_POST['deletecart'])){
    $id = $_POST['id'];
    $userid = $_SESSION['userid'];
    $mysqli->query("DELETE FROM `cart` WHERE `id`='$id' AND `user_id`='$userid'");
    if($mysqli->affected_rows>0) {
        $_SESSION['alert'] = "Sucessfully Deleted.";
    }else{
        $_SESSION['alert'] = " ".$mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <?php include 'includes/alert.php'; ?>
    <table class="table table-striped" border="1">
        <thead class="thead-dark">
            <th>Sr No</th>
            <th>Type</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
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
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button style="  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 30px;" type="submit" name="deletecart">Delete Cart</button>
                    </form>
                </td>
            </tr>
            <?php }}} ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total Price</td>
                <td colspan="2">Rs. <?= $totalprice ?></td>
            </tr>
            <tr>
                <td colspan="6"><button type="button" class="btn btn-info btn-lg"><a class="text-light bg-info" href="checkout.php">Checkout</a></button></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>