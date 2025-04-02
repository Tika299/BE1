<?php
require_once "danhmuc_database.php";
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
                <div id="shopping-cart">
                    <h2>Shopping Cart</h2>
                    <div class="float-end">
                        <a class="btn btn-outline-dark mt-auto" href="cleanCart.php" onclick="return confirm('Ban co muon xoa tat ca khong?')">Empty Cart</a>
                    </div>
                    <table class="table" cellpadding="10" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align:left;">ID</th>
                                <th style="text-align:left;">Ten</th>
                                <th style="text-align:right;" width="5%">Quantity</th>
                                <th style="text-align:right;" width="10%">Price<br>( in $)</th>
                                <th style="text-align:right;" width="10%">Total<br>( in $)</th>
                                <th style="text-align:center;" width="5%">Remove</th>
                            </tr>
                            <?php
                            require_once "sanpham_database.php";
                            $product_database = new SanPham_Database();
                            $products = $product_database->getAllSanPham();
                            $total = 0;
                            $sumQuantity = 0;
                            if (isset($_SESSION["cart"])) {
                                foreach ($_SESSION["cart"] as $key => $value) {
                                    foreach ($products as $product) {
                                        if ($product["ma"] == $key) {
                                            $sumQuantity += $value;
                                            $amount = $product["gia"] * $value;
                                            $total += $amount; ?>
                                            <tr>
                                                <td><?= $product["ma"] ?></td>
                                                <td><?= $product["ten"] ?></td>
                                                <td class="d-flex align-items-center"><a role="button" class="btn btn-info me-2" href="processQuantity.php?id=<?= $product["ma"] ?>&name=reduce"
                                                        style="text-decoration: none; color: aliceblue;">-</a><?= $value ?><a role="button" class="btn btn-danger ms-2" href="processQuantity.php?id=<?= $product["ma"] ?>&name=increase"
                                                        style="text-decoration: none; color: aliceblue;">+</a></td>
                                                <td class="gia"><?= number_format($product["gia"], 0, ",", ".") . "đ" ?></td>
                                                <td class="gia"><?= number_format($amount, 0, ",", ".") . "đ" ?></td>
                                                <td><a class="delete" id="delete" href="deleteProduct.php?id=<?= $product["ma"] ?>" onclick="return confirm('Ban co muon xoa khong?')"><i class="bi bi-trash"></i></a></td>
                                            </tr>
                            <?php }
                                    }
                                }
                            }
                            ?>
                            <tr>

                                <td colspan="2" align="right">Total:</td>
                                <td align="right"><?= $sumQuantity ?></td>
                                <td align="right" colspan="2"><strong><?= number_format($total, 0, ",", ".") . "đ" ?></strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php include_once "footer.php" ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>