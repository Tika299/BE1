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
	<?php include_once "navgation.php"; ?>
	<!-- Product section-->
	<section class="py-5">
		<div class="container px-4 px-lg-5 my-5">
			<!-- Edit Modal HTML -->
			<?php
			require_once "sanpham_database.php";
			require_once "danhmuc_database.php";

			$danhMuc_Database = new DanhMuc_Database();
			$categories = $danhMuc_Database->getAllDanhMuc();
			if (isset($_GET['id'])):
				$editID = $_GET['id'];
				$sanPham_Database = new SanPham_Database();
				extract($sanPham_Database->getSanPhamById($editID))
			?>
				<div id="editEmployeeModal" class="">
					<div class="modal-dialog">
						<div class="modal-content">
							<form action="handle_proct.php" method="post">
								<input type="hidden" name="action" value="edit">
								<div class="modal-header">
									<h4 class="modal-title">Edit Employee</h4>
									<button type="button" class="close" data-bs-dismiss="modal"
										aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<input name="ma" type="hidden" value="<?= $ma ?>" type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Name</label>
										<input name="ten" value="<?= $ten ?>" type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Price</label>
										<input name="gia" value="<?= $gia ?>" type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Desc</label>
										<textarea name="mota" class="form-control" required><?= $mota ?></textarea>
									</div>
									<div class="form-group">
										<label>Img</label>
										<input name="hinh" value="<?= $hinh ?>" type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<select name="madanhmuc" required>
											<?php foreach ($categories as $category) : ?>
												<option value="<?= $category['ma'] ?>" <?= $madanhmuc == $category['ma'] ? 'selected' : '' ?>>
													<?= $category['ten'] ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-info">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
		</div>
	</section>

	<!-- Footer-->
	<?php include_once "footer.php"; ?>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="js/scripts.js"></script>

</body>

</html>