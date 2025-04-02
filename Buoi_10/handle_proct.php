<?php
require_once "sanpham_database.php";

$sanPham_Database = new SanPham_Database();

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} elseif (isset($_POST['action'])) {
    $action = $_POST["action"];
} else {
    $action = '';
}

if ($action == "delete") {
    $id = $_GET["id"];
    $sanPham_Database->deleteSanPhamById($id);
    header("location: crud.php");
    exit();
} elseif ($action == "add") {
    $id = $_POST["ma"];
    $name = $_POST["ten"];
    $price = $_POST["gia"];
    $desc = $_POST["mota"];
    $image = $_POST["hinh"];
    $category = $_POST["madanhmuc"];
    $sanPham_Database->addSanPham($id, $name, $price, $desc, $image, $category);
    header("location: crud.php");
    exit();
} elseif ($action == "edit") {
    $id = $_POST["ma"];
    $name = $_POST["ten"];
    $price = $_POST["gia"];
    $desc = $_POST["mota"];
    $image = $_POST["hinh"];
    $category = $_POST["madanhmuc"];
    $sanPham_Database->editSanPham($id, $name, $price, $desc, $image, $category);
    // $sanphams = $sanPham_Database->getAllSanPham();
    // foreach($sanphams as $sanpham) {
    //     echo var_dump($sanpham);
    // }
    header("location: crud.php");
    exit();
}