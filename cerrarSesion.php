<?php 

session_start();
session_destroy();
header("location: ../medicina/login.html");

?>