<?php
require_once './src/Database.php';
require './db/db.php';
$db = new DatabaseConfig();
$user = $db->Con()->query("SELECT * FROM parrain WHERE FULLNAME= '".$_SESSION['fullname']."'")->fetch();
?>
<!DOCTYPE html>
<html lang="en" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.39.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto">
        <div class="text-center text-3xl font-bold mt-5">
            Félicitation <?php echo $user['FULLNAME']; ?>, vous êtes bien enregistrer.
            <div class="card">
                <figure>
                    <img src="./upload/<?php echo $user['PICTURE']; ?>" width="250" height="2520" alt="">
                </figure>
                <div class="card-body">
                    <p>
                        <?php echo $user['FULLNAME']; ?>
                    </div>
                    <p class="font-bold">
                       Faculté: <?php echo $user['FACULTY']; ?>
                    </p>
                    <p class="font-bold">
                       Email: <?php echo $user['EMAIL']; ?>
                    </p>
                    <p class="font-bold">
                        Contact: <?php echo $user['PHONE']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>