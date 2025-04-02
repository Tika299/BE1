<?php
require_once "sanpham_database.php";
require_once "danhmuc_database.php";
$sanpham_database = new SanPham_Database();
if (isset($_GET['sanpham_id'])) {
    $sanpham_id = $_GET['sanpham_id'];
    $sanpham = $sanpham_database->getSanPhamById($sanpham_id);
    $sanphamgiong = $sanpham_database->getSanPhamsByDanhMucId($sanpham['madanhmuc']);
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
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php include_once "navgation.php" ?>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="./img/<?= $sanpham['hinh'] ?>" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder"><?= $sanpham['ten'] ?></h1>
                    <div class="fs-5 mb-5">
                        <?php $price = isset($sanpham["gia"]) && is_numeric($sanpham["gia"]) ? (float)$sanpham["gia"] : 0; ?>
                        <span class="gia" data-price="<?= $price ?>">
                            <?php echo $price > 0 ? number_format($price, 0, ",", ".") . "đ" : "Liên hệ"; ?>
                        </span>
                    </div>
                    <p class="lead"><?= $sanpham['mota'] ?></p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <a href="buy.php?from=item&sanpham_id=<?= $sanpham['ma'] ?>" class="btn btn-outline-dark flex-shrink-0" role="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                foreach ($sanphamgiong as $sanpham1):
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a style="text-decoration: none;" href="item.php?danhmuc_id=<?= $sanpham1['madanhmuc'] ?>&sanpham_id=<?= $sanpham1['ma'] ?>"><img class="card-img-top" src="./img/<?= $sanpham1['hinh'] ?>" alt="..." /></a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a style="text-decoration: none;" href="item.php?danhmuc_id=<?= $sanpham1['madanhmuc'] ?>&sanpham_id=<?= $sanpham1['ma'] ?>">
                                        <h5 class="fw-bolder"><?= $sanpham1['ten'] ?></h5>
                                    </a>
                                    <!-- Product price-->
                                    <?= $sanpham1['gia'] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="buy.php?from=item&sanpham_id=<?= $sanpham1['ma'] ?>">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                ?>
            </div>
        </div>
    </section>
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