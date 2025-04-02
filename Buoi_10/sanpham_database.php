<?php
require_once "database.php";
class SanPham_Database extends Database
{
    public function getAllSanPham()
    {
        $conn = self::$connection->prepare("SELECT * FROM sanpham");
        $conn->execute();
        $items = array();
        $items = $conn->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getSanPhamById($id)
    {
        $conn = self::$connection->prepare("SELECT * FROM sanpham Where ma=?");
        $conn->bind_param('i', $id);
        $conn->execute(); //return an object
        $items = array();
        $items = $conn->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items[0];
    }

    public function getSanPhamsByDanhMucId($danhmuc_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM sanpham WHERE `madanhmuc` = ?");
        $sql->bind_param('i', $danhmuc_id);
        $sql->execute();
        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteSanPhamById($id)
    {
        $sql = self::$connection->prepare("DELETE FROM sanpham WHERE ma = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    public function addSanPham($id, $name, $price, $desc, $img, $category)
    {
        $sql = self::$connection->prepare("INSERT INTO sanpham (ma, ten, gia, mota, hinh, madanhmuc) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param('isdssi', $id, $name, $price, $desc, $img, $category);
        return $sql->execute();
    }

    public function editSanPham($id, $name, $price, $desc, $img, $category)
    {
        $sql = self::$connection->prepare("UPDATE `sanpham` SET `ten` = ?, `gia` = ?, `mota` = ?, `hinh` = ?, `madanhmuc` = ? WHERE `sanpham`.`ma` = ?");
        $sql->bind_param('sdssii', $name, $price, $desc, $img, $category, $id);
        return $sql->execute();
    }

    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM sanpham WHERE `ten` LIKE '%$keyword%'");
        $sql->execute(); // Thực thi truy vấn
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; // Trả về mảng sản phẩm đã sắp xếp theo ID
    }

    public function search_total($keyword)
    {
        $sql = self::$connection->prepare("SELECT count(*) as total FROM sanpham WHERE `ten` LIKE '%$keyword%'");
        $sql->execute(); // Thực thi truy vấn
        $items = array();
        $items = $sql->get_result()->fetch_assoc();
        return $items['total']; // Trả về mảng sản phẩm đã sắp xếp theo ID
    }

    public function pageinationBar($url, $page, $perpage, $total)
    {
        $links = "";

        $maxPage = ceil($total / $perpage);
        $nextPage = ($page < $maxPage) ? $page + 1 : $page;
        $backPage = ($page > 1) ? $page - 1 : 1;
        $links .= "<li class='page-item'><a class='page-link' href='$url&page=1'><span aria-hidden='true'>&laquo;</span></a></li>";
        $links .= "<li class='page-item'><a  class='page-link' href='$url&page=$backPage'><</a></li>";
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $page) {
                $links .= "<li class='page-item active'><a  class='page-link' href='$url&page=$i'>" . $i . "</a></li>";
            } else {
                $links .= "<li class='page-item'><a  class='page-link' href='$url&page=$i'>" . $i . "</a></li>";
            }
        }
        $links .= "<li class='page-item'><a  class='page-link' href='$url&page=$nextPage'>></a></li>";
        $links .= "<li class='page-item'><a class='page-link' href='$url&page=$maxPage'><span aria-hidden='true'>&raquo;</span></a></li>";

        return $links;
    }

    public function search_pagination($keyword, $page, $perpage)
    {
        $startRecord = ($page - 1) * $perpage;
        $keyword2 = "%$keyword%";
        $sql = self::$connection->prepare("SELECT * FROM sanpham WHERE `ten` LIKE ? LIMIT ?,?");
        $sql->bind_param('sii', $keyword2, $startRecord, $perpage);
        $sql->execute(); // Thực thi truy vấn
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
