<?php
require_once "database.php";
class DanhMuc_Database extends Database {
    public function getAllDanhMuc() {
        $conn = self::$connection->prepare("SELECT * FROM danhmuc");
        $conn->execute();
        $items = array();
        $items = $conn->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getDanhMucById($id)
    {
        $conn = self::$connection->prepare("SELECT * FROM danhmuc Where ma=?");
        $conn->bind_param('i', $id);
        $conn->execute(); //return an object
        $items = array();
        $items = $conn->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items[0];
    }
}