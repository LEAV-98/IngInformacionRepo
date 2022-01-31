<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php

if (isset($_POST['btn_save'])) {

	$course_code = $_POST["course_code"];

	$semester = $_POST["semester"];

	$timing_from = $_POST["timing_from"];

	$timing_to = $_POST["timing_to"];

	$day = $_POST["day"];

	$subject_code = $_POST["subject_code"];

	$room_no = $_POST["room_no"];

	$query = "insert into time_table(course_code,semester,timing_from,timing_to,day,subject_code,room_no)values('$course_code','$semester','$timing_from','$timing_to','$day','$subject_code','$room_no')";
	$run = mysqli_query($con, $query);
	if ($run) {
		echo "<script>alert('Insertado exitosamente');</script>";
	} else {
		echo "<script>alert('Error');</script>";
	}
}
?>

<!-- ---------------------------------------update time table------------------------------------------------ -->
<?php

if (isset($_POST['btn_update'])) {

	echo $course_code = $_POST["course_code"];

	echo $semester = $_POST["semester"];

	echo $timing_from = $_POST["timing_from"];

	echo $timing_to = $_POST["timing_to"];

	echo $day = $_POST["day"];

	echo $subject_code = $_POST["subject_code"];

	echo $room_no = $_POST["room_no"];

	$query1 = "update time_table set course_code='$course_code',semester='$semester',timing_from='$timing_from',timing_to='$timing_to',day='$day',subject_code='$subject_code',room_no='$room_no' where subject_code='$subject_code'";
	$run1 = mysqli_query($con, $query1);
	if ($run1) {
		echo "<script>alert('Editado exitosamente');</script>";
	} else {
		echo "<script>alert('Error');</script>";
	}
}
?>
<!-- ---------------------------------------update time table------------------------------------------------ -->

<!--*********************** PHP code end from here for data insertion into database ******************************* -->

<!doctype html>
<html lang="es">

<head>
	<title>Fisi - Horarios</title>
</head>

<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>

	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main">
			<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<div class="d-flex">
					<h4 class="mr-5">Adminstración de Horarios </h4>
					<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Horario</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 ml-2">
					<section class=" mt-3">
						<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-3 ml-5 ">
								<div class="col-md-12 pt-3 ml-5">
									<!-- Large modal -->
									<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header bg-info text-white">
													<h4 class="modal-title text-center">Agregar Horario</h4>
												</div>
												<div class="modal-body">
													<form action="time-table.php" method="post">
														<div class="row mt-3">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputEmail1">Código Carrera / Especialidad </label>
																	<select class="browser-default custom-select" name="course_code">
																		<option>Seleccionar Carrera / Especialidad</option>
																		<?php
																		$query = "select * from courses";
																		$run = mysqli_query($con, $query);
																		while ($row = mysqli_fetch_array($run)) {
																			echo	"<option value=" . $row['course_code'] . ">" . $row['course_name'] . "</option>";
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputEmail1">Seleccionar Semestre</label>
																	<select class="browser-default custom-select" name="semester">
																		<option>Seleccionar Semestre</option>
																		<?php
																		$teacher_id = $_SESSION['teacher_id'];
																		$query = "select distinct(semester) as semester from course_subjects";
																		$run = mysqli_query($con, $query);
																		while ($row = mysqli_fetch_array($run)) {
																			echo	"<option value=" . $row['semester'] . ">" . $row['semester'] . "</option>";
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputEmail1">Hora Inicio </label>
																	<input type="time" name="timing_from" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="formp">
																	<label for="exampleInputPassword1">Hora Final</label>
																	<input type="time" name="timing_to" class="form-control">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputEmail1">Dia </label>
																	<select class="browser-default custom-select" name="day">
																		<option>Seleccionar dia de semana</option>
																		<?php
																		$teacher_id = $_SESSION['teacher_id'];
																		$query = "select * from weekdays";
																		$run = mysqli_query($con, $query);
																		while ($row = mysqli_fetch_array($run)) {
																			echo	"<option value=" . $row['day_id'] . ">" . $row['day_name'] . "</option>";
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="formp">
																	<label for="exampleInputPassword1">Seleccionar Curso</label>
																	<select class="browser-default custom-select" name="subject_code" required="">
																		<option>Seleccionar Curso</option>
																		<?php
																		$query = "select * from course_subjects";
																		$run = mysqli_query($con, $query);
																		while ($row = mysqli_fetch_array($run)) {
																			echo	"<option value=" . $row['subject_name'] . ">" . $row['subject_name'] . "</option>";
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="formp">
																	<label for="exampleInputPassword1">Seleccionar Aula</label>
																	<input type="text" name="room_no" class="form-control" placeholder="Seleccione Aula">
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<input type="submit" class="btn btn-primary" name="btn_save" value="Guardar">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<table class="w-100 table-elements table-three-tr" cellpadding="3">
									<tr class="table-tr-head table-three text-white">
										<td colspan="5" class="text-center text-white">
											<h4>Tabla de Horarios</h4>
										</td>
										<td width="10">
											<div class="row">
												<div class="col-md-12">
													<div class="col-md-1 mt-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Actualizar</button>
													</div>
													<!-- Large modal -->
													<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header bg-info text-white">
																	<h4 class="modal-title text-center">Actualizar Horario</h4>
																</div>
																<div class="modal-body">
																	<form action="time-table.php" method="post">
																		<div class="row mt-3">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Código de Carrera / Especialidad </label>
																					<select class="browser-default custom-select" name="course_code">
																						<option>Seleccionar Carrera</option>
																						<?php
																						$query = "select distinct(course_code) as course_code from time_table";
																						$run = mysqli_query($con, $query);
																						while ($row = mysqli_fetch_array($run)) {
																							echo	"<option value=" . $row['course_code'] . ">" . $row['course_code'] . "</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Semester Or Years:</label>
																					<select class="browser-default custom-select" name="semester">
																						<option>Seleccionar semestre</option>
																						<?php
																						$query = "select distinct(semester) as semester from time_table";
																						$run = mysqli_query($con, $query);
																						while ($row = mysqli_fetch_array($run)) {
																							echo	"<option value=" . $row['semester'] . ">" . $row['semester'] . "</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Hora inicio </label>
																					<input type="time" name="timing_from" class="form-control">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Hora final</label>
																					<input type="time" name="timing_to" class="form-control">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Dia </label>
																					<select class="browser-default custom-select" name="day">
																						<option>Seleccionar dia</option>
																						<?php
																						$teacher_id = $_SESSION['teacher_id'];
																						$query = "select * from weekdays";
																						$run = mysqli_query($con, $query);
																						while ($row = mysqli_fetch_array($run)) {
																							echo	"<option value=" . $row['day_id'] . ">" . $row['day_name'] . "</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Seleccionar curso</label>
																					<select class="browser-default custom-select" name="subject_code" required="">
																						<option>Seleccione curso</option>
																						<?php
																						$query = "select * from time_table";
																						$run = mysqli_query($con, $query);
																						while ($row = mysqli_fetch_array($run)) {
																							echo	"<option value=" . $row['subject_code'] . ">" . $row['subject_code'] . "</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Aula</label>
																					<input type="text" name="room_no" class="form-control" placeholder="Seleccione un aula">
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<input type="submit" class="btn btn-primary" name="btn_update" value="Actualizar">
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
										</td>
									</tr>
									<tr class="table-tr-head">
										<th>Id</th>
										<th>Nombre Curso</th>
										<th>Hora</th>
										<th>Dia</th>
										<th>Carrera / <br> Especialidad</th>
										<th>Aula</th>
									</tr>
									<?php
									$query = "select id,course_code,TIME_FORMAT(timing_from,'%h:%i %p') as timing_from,TIME_FORMAT(timing_to,'%h:%i %p') as timing_to,semester,day_name,day_id,day,subject_code,room_no from time_table tt inner join weekdays wd on tt.day=wd.day_id";
									$run = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($run)) {
										echo "<tr>";
										echo "<td>" . $row["id"] . "</td>";
										echo "<td>" . $row["course_code"] . " " . $row["semester"] . "</td>";
										echo "<td>" . $row["timing_from"] . "<br>" . $row["timing_to"] . "</td>";
										echo "<td>" . $row["day_name"] . "</td>";
										echo "<td>" . $row["subject_code"] . "</td>";
										echo "<td>" . $row["room_no"] . "</td>";
										echo "</tr>";
									}
									?>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>