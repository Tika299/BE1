<?php
session_start();
if(isset($_GET['id']) && isset($_GET['name'])){
    $id = $_GET['id'];
    $check = $_GET["name"];
        if($check == "increase"){
            $_SESSION["cart"][$id]++;
        }
        else{
            if($_SESSION["cart"][$id] > 1){
                $_SESSION["cart"][$id]--;
            }else if($_SESSION["cart"][$id] == 1){
                unset($_SESSION["cart"][$id]);
            }
        }
}
header("location: cart.php");
?>