<?php

require_once './src/Database.php';
require './db/db.php';
$db = new DatabaseConfig();
// header('location:setProfile.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once './partial/_static.php'; ?>

    <title>SponsorShipp</title>
</head>

<body>
    <?php include_once './partial/nav.php'; ?>
    <!--=============== MAIN ===============-->
    <main class="container section container_sponsor" id="sponsorship">









    </main>
    <!--=============== MAIN JS ===============-->
    <script src="./js/main.js" type="module"></script>
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-LLWL5N9CSM"></script> -->
</body>

</html>

<style>
.parrain {
    width: 100%;
}
</style>