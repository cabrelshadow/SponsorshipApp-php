
<?php
require_once './src/Database.php';
require './db/db.php';
$db = new DatabaseConfig();
$user = $db->Con()->query("SELECT * FROM filleuls WHERE FULLNAME= '".$_SESSION['fullname']."'")->fetch();
extract($user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css"
        integrity="sha512-+oRH6u1nDGSm3hH8poU85YFIVTdSnS2f+texdPGrURaJh8hzmhMiZrQth6l56P4ZQmxeZzd2DqVEMqQoJ8J89A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"
        integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

 

    <div class="contain">
    Félicitation <?php echo $FULLNAME; ?>, vous êtes bien enregistrer.
        <span class="boule1"></span>
        <span class="boule2"></span>

           
        <div class="contain_img">
            <img src="./upload/<?php echo $PICTURE; ?>" alt="">

        </div>

        <div class="contain_text">
            <div class="d1"><span class="log"> <i class="fa-solid fa-user"></i> </span> <span class="dde">
            <?php echo $FULLNAME; ?>
            </span></div>
            <div class="d2"><span class="log"> <i class="fa-solid fa-barcode"></i></span> <span class="dde"> <?php echo $FACULTY; ?></span></div>

            <div class="d2"><span class="log"> <i class="fa-solid fa-envelope"></i> </span> <span class="dde"><?php echo $EMAIL; ?></span></div>

            <div class="d2"><span class="log"><i class="fa-solid fa-phone"></i> </span> <span class="dde"><?php echo $PHONE; ?></span></div>

            <!-- <p class="p1">Tic Pam</p>
            <p class="p2">sadoscott@gmail.com</p>
            <p class="p3">=234 690233345</p>
            <p class="p4"> Sado scott en tic pam 1</p> -->

        </div>
        <div class="contain_information">

        <a href="register.php">  <button> <i class="fa-solid fa-arrow-left-long"></i> retourner </button></a>
        </div>

    </div>


</body>

</html>