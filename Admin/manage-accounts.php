<!---------------- Session starts form here ----------------------->
	<?php
	session_start();
	if (!$_SESSION["LoginAdmin"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
	<!---------------- Session Ends form here ------------------------>

	<?php
	$message = "";
	$account = "";
	if (isset($_POST['submit'])) {
		$account = $_POST['account'];
		$user_id = $_POST['user_id'];
		$que = "update login set account='$account' where user_id = '$user_id'";
		$run = mysqli_query($con, $que);
		if ($run) {
			$message =  $account == "Activate" ? "Account Activated Successfully" : "Account Deactivated Successfully";
		} else {
			$message = "Account Not Activated  Successfully";
		}
	}
	?>

	<!doctype html>
	<html lang="es">

	<head>
		<title>Fisi - Cuentas</title>
		<link rel="shortcut icon" href="../Images/logo-unmsm.png" type="image/x-icon">
	</head>

	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Administrar cuentas de usuario </h4>
				</div>
				<div class="row">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php
								if (($account == "Activate" or $account == "Deactivate") and $message == true)
									$bg_color = "alert-success";
								else if ($message == true)
									$bg_color = "alert-danger";
								?>
								<h5 class="py-2 pl-3 <?php echo $bg_color; ?>">

									<?php echo $message ?>
								</h5>
							</div>
							<div class="col-md-12">
								<form action="manage-accounts.php" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Código</label>
												<input type="text" name="user_id" class="form-control" required placeholder="Ingrese el código">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Ingrese el estado de la cuenta</label>
												<select name="account" class="form-control">
													<option>Seleccione estado</option>
													<option value="Activate">Activado</option>
													<option value="Deactivate">Desactivado</option>

												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="submit" name="submit" value="Cambiar" class="btn btn-primary px-5">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>

	</html>