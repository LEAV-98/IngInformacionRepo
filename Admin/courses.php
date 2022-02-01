<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>

<!-- --------------------------------add courses------------------------------------- -->
<?php
if (isset($_POST['sub'])) {
	$course_code = $_POST['course_code'];
	$course_name = $_POST['course_name'];
	// $semester_or_year = $_POST['semester_or_year'];
	$no_of_year = $_POST['no_of_year'];

	// $query = "insert into courses(course_code,course_name,no_of_year)values('$course_code','$course_name','$semester_or_year','$no_of_year')";
	$query = "insert into courses(course_code,course_name,no_of_year)values('$course_code','$course_name','$no_of_year')";
	$run = mysqli_query($con, $query);
	if ($run) {
		echo "<script>alert('Insertado exitosamente');</script>";
	} else {
		echo "<script>alert('Error');</script>";
	}
}
?>

<!-- --------------------------------End Php------------------------------------- -->


<!doctype html>
<html lang="es">

<head>
	<title>FISI - Carreras / Especializaciones</title>
	<link rel="shortcut icon" href="../Images/logo-unmsm.png" type="image/x-icon">
</head>

<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>

	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main">
			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Panel administrador de Carreras y Especializaciones </h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form action="courses.php" method="post">
						<div class="row mt-3">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Código: </label>
									<input type="text" name="course_code" class="form-control" required placeholder="Ingresar Código">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Nombre </label>
									<input type="text" name="course_name" class="form-control" required placeholder="Ingresar Nombre">
								</div>
							</div>
						</div>
						<div class="row">
							<!-- <div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Semestre</label>
										<input type="text" name="semester_or_year" class="form-control" required placeholder="Enter Semester Or Years">
									</div>
								</div> -->
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Duración (Años)</label>
									<input type="text" name="no_of_year" class="form-control" required placeholder="Ingresar años">
								</div>
							</div>
						</div>
						<div class="row w-100">
							<div class="col-md-12">
								<input type="submit" name="sub" value="Añadir " class=" btn btn-primary ml-auto">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 ml-2">
					<section class="mt-3">
						<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="3">
							<tr class="table-tr-head table-three text-white">
								<th>N°</th>
								<th>Código</th>
								<th>Nombre</th>
								<th>Años</th>
								<th>Accion</th>
							</tr>
							<?php
							$sr = 1;
							$query = "select course_code,course_name,no_of_year from courses";
							$run = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($run)) {
								echo	"<tr>";
								echo	"<td>" . $sr++ . "</td>";
								echo	"<td>" . $row['course_code'] . "</td>";
								echo	"<td>" . $row['course_name'] . "</td>";
								echo	"<td>" . $row['no_of_year'] . "</td>";
								echo	"<td width='20'><a class='btn btn-danger' href=delete-function.php?course_code=" . $row['course_code'] . ">Eliminar</a></td>";
								echo	"</tr>";
							}

							?>
						</table>
					</section>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>