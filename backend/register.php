<?php

require_once '../src/Database.php';
require '../db/db.php';
$db = new DatabaseConfig();
$post_data = $_POST;
if (isset($post_data['fullname']) && isset($post_data['email']) && isset($post_data['tel']) && isset($post_data['faculty'])) {
    $fullname = $post_data['fullname'];
    $email = $post_data['email'];
    $tel = $post_data['tel'];
    $fac = $post_data['faculty'];
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
                $getFilleul = $db->Con()->query("SELECT * FROM filleuls WHERE FULLNAME='".$fullname."' AND EMAIL='".$email."' AND FACULTY='".$fac."'");
                if ($getFilleul->rowCount() === 0) {
                    $time = time();
                    $new_img_name = time().'.'.$img_ext;
                    if (move_uploaded_file($tmp_name, '../upload/'.$new_img_name)) {
                        $add = $db->Con()->query("INSERT INTO filleuls (FULLNAME, PHONE,EMAIL,FACULTY,PICTURE) VALUES ('".$fullname."','".$tel."','".$email."','".$fac."','".$new_img_name."')");
                        if ($add) {
                            $_SESSION['fullname'] = $fullname;
                            header('location:../successFilleuls.php');
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
} else {
    echo 'balal';
}
