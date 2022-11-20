<?php
require_once './src/Database.php';
require './db/db.php';
require './src/Profiles.php';
$profile = new Profiles();
$db = new DatabaseConfig();
$user = '';
if (isset($_SESSION['IDFILLEULS'])) {
    $user = $profile->getUser($db->Con(), 'filleuls', $_SESSION['IDFILLEULS']);
}
if (isset($_POST['submit']) && isset($_SESSION['IDFILLEULS'])) {
    if (isset($_FILES['avatar'])) {
        $img_name = $_FILES['avatar']['name'];
        $img_type = $_FILES['avatar']['type'];
        $tmp_name = $_FILES['avatar']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ['jpeg', 'png', 'jpg'];
        if (in_array($img_ext, $extensions) === true) {
            $types = ['image/jpeg', 'image/jpg', 'image/png'];
            if (in_array($img_type, $types) === true) {
                $getFilleul = $db->Con()->query("SELECT * FROM filleuls WHERE IDFILLEULS='".$_SESSION['IDFILLEULS']."'");
                if ($getFilleul->rowCount() > 0) {
                    $time = time();
                    $new_img_name = time().'.'.$img_ext;
                    if (move_uploaded_file($tmp_name, './upload/'.$new_img_name)) {
                        $add = $db->Con()->query("UPDATE filleuls SET PICTURE = '".$new_img_name."' WHERE IDFILLEULS='".$_SESSION['IDFILLEULS']."'");
                        if ($add) {
                            $_SESSION['fullname'] = $user['FULLNAME'];
                            header('location:./successFilleuls.php');
                        }
                    } else {
                        echo "Une erreure lors de l'exportation";
                    }
                } else {
                    echo 'erreur';
                }
            } else {
                echo 'fichier image - jpeg, png, jpg requis';
            }
        } else {
            echo 'fichier image - jpeg, png, jpg requis';
        }
    }
}
if (isset($_SESSION['IDPARRAIN'])) {
    $user = $profile->getUser($db->Con(), 'parrain', $_SESSION['IDPARRAIN']);
}

if (isset($_POST['submit']) && isset($_SESSION['IDPARRAIN'])) {
    if (isset($_FILES['avatar'])) {
        $img_name = $_FILES['avatar']['name'];
        $img_type = $_FILES['avatar']['type'];
        $tmp_name = $_FILES['avatar']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ['jpeg', 'png', 'jpg'];
        if (in_array($img_ext, $extensions) === true) {
            $types = ['image/jpeg', 'image/jpg', 'image/png'];
            if (in_array($img_type, $types) === true) {
                $getFilleul = $db->Con()->query("SELECT * FROM parrain WHERE IDPARRAIN='".$_SESSION['IDPARRAIN']."'");
                if ($getFilleul->rowCount() > 0) {
                    $time = time();
                    $new_img_name = time().'.'.$img_ext;
                    if (move_uploaded_file($tmp_name, './upload/'.$new_img_name)) {
                        $add = $db->Con()->query("UPDATE parrain SET PICTURE = '".$new_img_name."' WHERE IDPARRAIN='".$_SESSION['IDPARRAIN']."'");
                        if ($add) {
                            $_SESSION['fullname'] = $user['FULLNAME'];
                            header('location:./successParrain.php');
                        }
                    } else {
                        echo "Une erreure lors de l'exportation";
                    }
                }
            } else {
                echo 'fichier image - jpeg, png, jpg requis';
            }
        } else {
            echo 'fichier image - jpeg, png, jpg requis';
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
    <title>Profile - <?php echo $user['FULLNAME']; ?></title>
    <link rel="stylesheet" href="./css/bs.css">
</head>
<body>
    <div class="container">
        <div class="profile">

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="" class="form-label"> <?php echo $user['FULLNAME']; ?> veillez choisir votre photo</label>
                  <input type="file" class="form-control" name="avatar" id="photo" accept="image/*" placeholder="" aria-describedby="fileHelpId">
                  <div id="fileHelpId" class="form-text">

                  </div>
                </div>
                <button class="btn btn-success w-100" name="submit" type="submit">Enregistrer</button>
                <center><a href="./logout.php">se deconnecter</a> </center>
            </form>
        </div>
    </div>
</body>
</html>