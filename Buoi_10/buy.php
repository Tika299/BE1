<?php
session_start();
if (isset($_GET["sanpham_id"])) {
    $id = $_GET["sanpham_id"];

    //Neu ma ton tai thi tang so luong
    if (isset($_SESSION["cart"][$id])) {
        $_SESSION["cart"][$id]++;
    }
    // Neu ma khong ton tai thi them vao dong data moi
    else {
        $_SESSION["cart"][$id] = 1;
    }
}
if (isset($_GET["from"])) {
    header("location: item.php?sanpham_id=$id");
} else {
    header("location: index1.php");
}
