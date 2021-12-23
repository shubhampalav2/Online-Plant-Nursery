<?php include('includes/config.php') ?>
<?php if(!isset($_SESSION['userid'])){
    header('location:plant.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'includes/alert.php'; ?>
</body>
</html>