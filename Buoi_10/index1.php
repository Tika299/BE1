<?php
require_once "danhmuc_database.php";
require_once "sanpham_database.php";
$sanpham_database = new SanPham_Database();
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $perpage = 2;
    $page = ($_GET['page']) ?? 1;
    $sanphams = $sanpham_database->search_pagination($keyword, $page, $perpage);
} else if (isset($_GET['danhmuc_id'])) {
    $danhmuc_id = $_GET['danhmuc_id'];
    $sanphams = $sanpham_database->getSanPhamsByDanhMucId($danhmuc_id);
} else {
    $sanphams = $sanpham_database->getAllSanPham();
}
$danhmuc_database = new DanhMuc_Database();
$danhmucs = $danhmuc_database->getAllDanhMuc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .pageinatinBar {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include_once "navgation.php" ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                foreach ($sanphams as $sanpham):
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a style="text-decoration: none;" href="item.php?danhmuc_id=<?= $sanpham['madanhmuc'] ?>&sanpham_id=<?= $sanpham['ma'] ?>"><img class="card-img-top" src="./img/<?= $sanpham['hinh'] ?>" alt="..." /></a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a style="text-decoration: none;" href="item.php?danhmuc_id=<?= $sanpham['madanhmuc'] ?>&sanpham_id=<?= $sanpham['ma'] ?>">
                                        <h5 class="fw-bolder"><?= $sanpham['ten'] ?></h5>
                                    </a>
                                    <!-- Product price-->
                                    <?php $price = isset($sanpham["gia"]) && is_numeric($sanpham["gia"]) ? (float)$sanpham["gia"] : 0; ?>
                                    <span class="gia text-center" data-price="<?= $price ?>">
                                        <?php echo $price > 0 ? number_format($price, 0, ",", ".") . "đ" : "Liên hệ"; ?>
                                    </span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-id="<?= $sanpham["ma"] ?>" href="buy.php?sanpham_id=<?= $sanpham["ma"] ?>">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                ?>
            </div>
        </div>
    </section>
    <?php
    if (isset($_GET['keyword'])) {
        $url = $_SERVER['PHP_SELF'] . "?keyword=" . $keyword;
        $total = $sanpham_database->search_total($keyword);
    ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                echo $sanpham_database->pageinationBar($url, $page, $perpage, $total);
                ?></ul>
        </nav>
    <?php
    }
    ?>
    <!-- Footer -->
    <?php include_once "footer.php" ?>
    <script>
        document.querySelectorAll('.gia').forEach((element) => {
            const price = parseInt(element.getAttribute('data-price'));
            if (!isNaN(price)) {
                const formattedPrice = new Intl.NumberFormat('vi-VN').format(price) + 'đ';
                element.textContent = formattedPrice;
            }
        });
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>