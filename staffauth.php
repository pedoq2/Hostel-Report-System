<?php

?>

<?php
session_start();
if(!isset($_SESSION["staffusername"])){
header("Location: login.php");
exit(); }
?>
