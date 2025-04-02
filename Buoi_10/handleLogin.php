<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['user'])) {
    header('Location: crud.php');
    exit();
}

// Kiểm tra xem có dữ liệu POST từ form không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['password'];

    // Ví dụ kiểm tra tài khoản
    if ($username === 'admin' && $password === '1') {
        $_SESSION['user'] = $username; // Lưu tên người dùng vào session
        header('Location: crud.php'); // Chuyển hướng đến trang admin
        exit();
    } else {
        $_SESSION['error'] = 'Tài khoản hoặc mật khẩu không đúng!';
        header('Location: login.php'); // Chuyển hướng lại về trang đăng nhập
        exit();
    }
}
?>