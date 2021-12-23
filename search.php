<?php 
require('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
crossorigin="anonymous">
</head>
<style>
     .button a,button,input{
            text-align: center;
            font-size: 26px;
            background-color:black;
            text-decoration: none;
        }
</style>
<body>
  <!-- Featured Products Starts Here -->
  <section class="Product" id="Product">
      <h1 style="text-align: center;">Search Result for "<?= $_GET['search'] ?>"</h1>
      <?php include 'includes/alert.php'; ?>
      <div class="row ml-5 ">
        <?php 
        if (isset($_GET['search'])) {
            $search = "CONCAT(`c`.`name`,`p`.`name`,`p`.`price`) LIKE '%" . $_GET['search'] . "%'";
        } else {
            $search = "1";
        }
            $plant = $mysqli->query("SELECT `p`.* FROM `plants` AS `p` LEFT JOIN `category` AS `c` ON `c`.`id`=`p`.`category_id` WHERE $search ORDER BY `p`.`id` DESC");
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
                            <input type="hidden" name="type" value="plants">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="addcart" style="text-decoration: none; backgroud-color: black; color: white; border-radius: 25px;">Add to Cart</button>
                        <?php } ?>
                    </div> 
                </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php 
        if (isset($_GET['search'])) {
            $search1 = "CONCAT(`name`) LIKE '%" . $_GET['search'] . "%'";
        } else {
            $search1 = "1";
        }
            $plant = $mysqli->query("SELECT * FROM `products` WHERE $search1 ORDER BY `id` DESC");
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
                                <button type="submit" name="addcart" style="text-decoration: none; backgroud-color: black; color: white; border-radius: 25px;">Add to Cart</button>
                            <?php } ?>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
      </div>
    </section>   
    <!-- Featred Products Here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>    
</body>
</html>