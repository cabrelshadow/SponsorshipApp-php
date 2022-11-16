<?php
session_start();
if(isset($_SESSION["IDFILLEULS"])){
    unset($_SESSION["IDFILLEULS"]);
    session_destroy();
    header("Location:setProfile.php");
} else if(isset($_SESSION["IDPARRAIN"])){
    unset($_SESSION["IDPARRAIN"]);
    session_destroy();
    header("Location:setProfile.php");
}

?>