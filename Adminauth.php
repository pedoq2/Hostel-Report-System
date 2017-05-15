<?php

?>

<?php
session_start();
if(!isset($_SESSION["Adminusername"])){
header("Location: login.php");
exit(); }
?>
