<?php 
require_once "connect.php";
if($_SERVER["REQUEST_METHOD"]== "GET"){
    if(isset($_GET["id"])){
        $id = $_GET["id"];


    
  header("location:../admin_animaux.php");
    }
}