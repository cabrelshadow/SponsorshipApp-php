<?php
require_once './src/Database.php';
require './db/db.php';
require './src/Profiles.php';
$profile = new Profiles();
$db = new DatabaseConfig();
$post_data = $_POST;
extract($_POST);
if (isset($submit)) {
    if (isset($number)) {
        if ($profile->isParrainOrFilleul($db->Con(), $number) === 'Parrain') {
            $user = $profile->getProfile($db->Con(), 'parrain', $number);
            $_SESSION['IDPARRAIN'] = $user['IDPARRAIN'];
            header('location:profile.php');
        }
        if ($profile->isParrainOrFilleul($db->Con(), $number) === 'Filleul') {
            $user = $profile->getProfile($db->Con(), 'filleuls', $number);
            $_SESSION['IDFILLEULS'] = $user['IDFILLEULS'];
            header('location:profile.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identification</title>
    <link rel="stylesheet" href="./css/identification.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
           <div class="banner">
            <img src="./assets/banner-register.jpg" alt="">
           </div>
           <div class="form">
            <h2>
                Compléter votre profile
            </h2>
            <form action="" method="post">
                <div class="from-group">
                    <input type="tel" pattern="[0-9]+" class="form-control" name="number" placeholder="Votre numéro de tel">
                </div>
                <button class="btn-login" type="submit" name="submit">
                    Continuer
                </button>
            </form>
           </div>
        </div>
    </div>
</body>
</html>