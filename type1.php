<?php include 'includes/config.php'; ?>
<html>
    <head>
<style>
        *{
          margin:0;
          padding:0;
          font-family:sans-serif; 
          font-size: 13px;
          box-sizing: border-box;
        }   
        /* .button a{
            text-align: center;
            font-size: 20px;
            background-color:lightgreen;
            text-decoration: none;
        }    */
        .button a,button,input{
            text-align: center;
            font-size: 30px;
            background-color:black;
            text-decoration: none;
        }
    </style>
       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
       
    </head>
    <?php 
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
    ?>
    
    <body>
    <?php 
        $category=$mysqli->query("SELECT COUNT(`id`) AS `count` FROM `plants` WHERE `category_id`='$id'");
        foreach($category as $row){
    ?>
     <span style="font-size:23px;">Plants(Showing 1 - <?= $row['count'] ?> of <?= $row['count'] ?> items)</span><br>
    <?php }?>
    <br>
    <?php 
        $category=$mysqli->query("SELECT * FROM `category` WHERE `id`='$id'");
        foreach($category as $row){
    ?>
    <span style="font-size:23px;">Type:<?= $row['name'] ?></span>
    <?php } ?>
    <br>
    <br>
    <?php include 'includes/alert.php'; ?>
        <div class="row ml-5 ">
            <?php 
                $product = $mysqli->query("SELECT * FROM `plants` WHERE `category_id`='$id'");
                foreach($product as $row){
            ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-center mt-4" style="width: 65%;">
                    <img src="images/<?= $row['image'] ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <form action="" method="POST">
                            <h4><?= $row['name'] ?></h4><br>
                            <a href="#">Rs. <?= $row['price'] ?></a> <br>
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


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>    
    </body>

</html>