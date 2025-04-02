<?php
require_once "sanpham_database.php";
$sanPham_Database = new SanPham_Database();
$sanphams = $sanPham_Database->getAllSanPham();
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
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2>Manage <b>Employees</b></h2>
							</div>
							<div class="col-sm-6">
								<a href="form_add_product.php" class="btn btn-success"><i class="bi bi-pencil"></i><span>Add New Employee</span></a>

							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>
									<span class="custom-checkbox">
										<input type="checkbox" id="selectAll">
										<label for="selectAll"></label>
									</span>
								</th>
								<th>ID</th>
								<th>Name</th>
								<th>Price</th>
								<th>Desc</th>
								<th>Img</th>
								<th>CategoryID</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($sanphams as $sanpham): 
								extract($sanpham)
								?>
							<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1"></label>
									</span>
								</td>
								<td><?=$ma?></td>
								<td><?=$ten?></td>
								<td><?=$gia?></td>
								<td><?=$mota?></td>
								<td><?=$hinh?></td>
								<td><?=$madanhmuc?></td>
								<td>
									<a href="form_edit_product.php?id=<?=$ma?>" class="edit"><i class="bi bi-pencil"></i></a>
									<a href="handle_proct.php?action=delete&id=<?=$ma?>" class="delete" onclick="return confirm('Ban co muon xoa san pham <?=$ten?> khong?')"><i class="bi bi-trash"></i></a>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<div class="clearfix">
						<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
						<ul class="pagination">
							<li class="page-item"><a href="#" class="page-link">Previous</a></li>
							<li class="page-item"><a href="#" class="page-link">1</a></li>
							<li class="page-item"><a href="#" class="page-link">2</a></li>
							<li class="page-item active"><a href="#" class="page-link">3</a></li>
							<li class="page-item"><a href="#" class="page-link">4</a></li>
							<li class="page-item"><a href="#" class="page-link">5</a></li>
							<li class="page-item"><a href="#" class="page-link">Next</a></li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Add Modal HTML -->
			<div id="addEmployeeModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form>
							<div class="modal-header">
								<h4 class="modal-title">Add Employee</h4>
								<button type="button" class="close" data-bs-dismiss="modal"
									aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" required></textarea>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-success" value="Add">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Edit Modal HTML -->
			<div id="editEmployeeModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form>
							<div class="modal-header">
								<h4 class="modal-title">Edit Employee</h4>
								<button type="button" class="close" data-bs-dismiss="modal"
									aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" required></textarea>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-info" value="Save">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Delete Modal HTML -->
			<div id="deleteEmployeeModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form>
							<div class="modal-header">
								<h4 class="modal-title">Delete Employee</h4>
								<button type="button" class="close" data-bs-dismiss="modal"
									aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to delete these Records?</p>

							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-danger" value="Delete">
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
		</div>
	</section>

	<!-- Footer -->
    <?php include_once "footer.php" ?>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="js/scripts.js"></script>

</body>

</html>