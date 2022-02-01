<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";
	?>
<!---------------- Session Ends form here ------------------------>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

		$roll_no= $_POST["roll_no"];

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];
 		
 		$last_name=$_POST["last_name"];
 		
 		//$father_name=$_POST["father_name"];
 		
 		$email=$_POST["email"];
 		
 		$mobile_no=$_POST["mobile_no"];

 		//$course_code=$_POST['course_code'];

 		//$session=$_POST['session'];
 		
 		//$prospectus_issued=$_POST["prospectus_issued"];
 		
 		//$prospectus_amount=$_POST["prospectus_amount"];
 		
 		//$form_b=$_POST["form_b"];
 		
 		//$applicant_status=$_POST["applicant_status"];
 		
 		//$application_status=$_POST["application_status"];
 		
 		//$cnic=$_POST["cnic"];
 		
 		$dob=$_POST["dob"];
 		 		
 		$gender=$_POST["gender"];
 		
		//$permanent_address=$_POST["permanent_address"];
 		
 		$current_address=$_POST["current_address"];
 		
 		$place_of_birth=$_POST["place_of_birth"];
 		
 		//$matric_complition_date=$_POST["matric_complition_date"];
 		
 		//$matric_awarded_date=$_POST["matric_awarded_date"];
 		
 		//$fa_complition_date=$_POST["fa_complition_date"];
 		
 		//$fa_awarded_date=$_POST["fa_awarded_date"];
 		
 		//$ba_complition_date=$_POST["ba_complition_date"];
 		
 		//$ba_awarded_date=$_POST["ba_awarded_date"];

 		$password=$_POST['password'];

 		$role=$_POST['role'];

 		

// *****************************************Images upload code starts here********************************************************** 
		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		//$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

		//$fa_certificate = $_FILES['fa_certificate']['name'];$tmp_name=$_FILES['fa_certificate']['tmp_name'];$path = "images/".$fa_certificate;move_uploaded_file($tmp_name, $path);

		//$ba_certificate = $_FILES['ba_certificate']['name'];$tmp_name=$_FILES['ba_certificate']['tmp_name'];$path = "images/".$ba_certificate;move_uploaded_file($tmp_name, $path);


// *****************************************Images upload code end here********************************************************** 

 		//$query="Insert into student_info(roll_no,first_name,middle_name,last_name,father_name,email,mobile_no,course_code,session,profile_image,prospectus_issued,prospectus_amount,form_b,applicant_status,application_status,cnic,dob,gender,permanent_address,current_address,place_of_birth,matric_complition_date,matric_awarded_date,matric_certificate,fa_complition_date,fa_awarded_date,fa_certificate,ba_complition_date,ba_awarded_date,ba_certificate)values('$roll_no','$first_name','$middle_name','$last_name','$father_name','$email','$mobile_no','$course_code','$session','$profile_image','$prospectus_issued','$prospectus_amount','$form_b','$applicant_status','$application_status','$cnic','$dob','$gender','$permanent_address','$current_address','$place_of_birth','$matric_complition_date','$matric_awarded_date','$matric_certificate','$fa_complition_date','$fa_awarded_date','$fa_certificate','$ba_complition_date','$ba_awarded_date','$ba_certificate')";
 		$query="Insert into student_info
		 (roll_no,first_name,middle_name,last_name,email,mobile_no,profile_image,dob,gender,current_address,place_of_birth)
		 values
		 ('$roll_no','$first_name','$middle_name','$last_name','$email','$mobile_no','$profile_image','$dob','$gender','$current_address','$place_of_birth')";
		 //echo "$query";
		 $run=mysqli_query($con, $query);
 		if ($run) {
			echo "<script>alert('Your Data has been submitted');</script>";
 		}
 		else {
			echo "<script>alert('Your Data has not been submitted');</script>";
 		}
 		$query2="insert into login(user_id,Password,Role)values('$roll_no','$password','$role')";
 		$run2=mysqli_query($con, $query2);
 		if ($run2) {
 			//echo "Your Data has been submitted into login";
 		}
 		else {
 			echo "Your Data has not been submitted into login";
 		}
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];

		$semester=$_POST['semester'];

		$roll_no=$_POST['roll_no'];

		$subject_code=$_POST['subject_code'];

		$date=date("d-m-y");

		$query3="insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('$course_code','$semester','$roll_no','$subject_code','$date')";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 
<!doctype html>
<html lang="es">
	<head>
		<title>Admin - Register Student</title>
		<link rel="shortcut icon" href="../Images/logo-unmsm.png" type="image/x-icon">
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Sistema de gestión de estudiantes</h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Añadir Estudiante</button>
					</div>
				</div>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info text-white">
							        <h4 class="modal-title text-center">Añadir nuevo estudiante</h4>
						        </div>
							    <div class="modal-body">
							        <form action="student.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Nombres:*</label>
											        <input type="text" name="first_name" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Apellido paterno:*</label>
												    <input type="text" name="middle_name" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Apellido materno:*</label>
												    <input type="text" name="last_name" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<!-- <div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Nombre del Padre:*</label>
											        <input type="text" name="father_name" class="form-control" required>
											    </div>
											</div> -->
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Código:</label>
												    <input type="text" name="roll_no" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Correo electrónico:*</label>
												    <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
											    </div>
											</div>
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Carrera: </label>
											        <select class="browser-default custom-select" name="course_code">
													    <option >Seleccionar Carrera</option>
													    <?php
															$query="select course_code from courses";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
															}
														?>
													</select>
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<!-- <div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Seleccionar sesión:</label>
												    <select class="browser-default custom-select" name="session">
													    <option >Seleccionar sesión</option>
													    <?php
															/* $query="select session from sessions";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['session'].">".$row['session']."</option>";
															} */
														?>
													</select>
											    </div>
											</div> -->
								  		</div> 
								  		<!-- <div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Emisión de prospecto: </label>
											        <select class="browser-default custom-select" name="prospectus_issued">
													  <option>Seleccionar opción</option>
													  <option value="Yes">Sí</option>
													  <option value="No">No</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Prospecto Importe recibido:</label>
												    <select class="browser-default custom-select" name="prospectus_amount">
													  <option>Seleccionar opción</option>
													  <option value="Yes">Sí</option>
													  <option value="No">No</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Formulario B:</label>
												    <input type="text" name="form_b" class="form-control">
											    </div>
											</div>
								  		</div> -->
								  		<!-- <div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Estado del solicitante: </label>
											        <select class="browser-default custom-select" name="applicant_status">
													  <option>Seleccionar opción</option>
													  <option value="Admitted">Aprovado</option>
													  <option value="Not Admitted">No Aprovado</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Estado de la aplicación:</label>
												    <select class="browser-default custom-select" name="application_status">
													  <option>Select Option</option>
													  <option value="Approved">Aprovado</option>
													  <option value="Not Approved">No Aprovados</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">CNIC No:</label>
												    <input type="text" name="cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" class="form-control">
											    </div>
											</div>
								  		</div> -->
								  		<div class="row">
											
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">No móvil:*</label>
												    <input type="number" name="mobile_no" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Género:</label>
												    <select class="browser-default custom-select" name="gender">
													  <option>Seleccione género</option>
													  <option value="Male">Masculino</option>
													  <option value="Female">Femenino</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Imagen de perfil:</label>
												    <input type="file" name="profile_image" placeholder="Student Age" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<!-- <div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Dirección permanente: </label>
											        <input type="text" name="permanent_address" class="form-control">
											    </div>
											</div> -->
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Direccion actual:</label>
												    <input type="text" name="current_address" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Lugar de nacimiento:</label>
												    <input type="text" name="place_of_birth" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Fecha de nacimiento: </label>
											        <input type="date" name="dob" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<!-- <div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Matrícula/OLevel Fecha de finalización: </label>
											        <input type="date" name="matric_complition_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Matric/OLevel Fecha de concesión:</label>
												    <input type="date" name="matric_awarded_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Subir Matrícula/Certificado OLevel:</label>
												    <input type="file" name="matric_certificate" class="form-control" value="there is no image">
											    </div>
											</div>
								  		</div> -->
								  		<!-- <div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">FA/ALevel Complition Date: </label>
											        <input type="date" name="fa_complition_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">FA/ALevel Awarded Date:</label>
												    <input type="date" name="fa_awarded_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Upload FA/ALevel Certificate:</label>
												    <input type="file" name="fa_certificate" class="form-control" value="there is no image" >
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">BA Complition Date: </label>
											        <input type="date" name="ba_complition_date" class="form-control" value="0">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">BA Awarded Date:</label>
												    <input type="date" name="ba_awarded_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Upload BA Certificate:</label>
												    <input type="file" value="C:/xampp/htdocs/Imperial University/Images/no-image-available.jpg" name="ba_certificate" class="form-control" >
											    </div>
											</div>
								  		</div> -->
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are here
								  		_________________________________________________________________________________ -->
								  		<div>
											<input type="hidden" name="password" value="student123*">
											<input type="hidden" name="role" value="Student">
								  		</div>
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
								  		<div class="modal-footer">
						   		            <input type="submit" class="btn btn-primary" name="btn_save">
		      								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									    </div>
									</form>
						        </div>
						    </div>
					   </div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<div class="row">
								<div class="col-md-6">
									<form action="search_student.php" method="post">
										<div class="form-group">
											<label for="exampleInputPassword1"><h5>Buscar:</h5></label>
											<div class="d-flex">
												<input type="text" name="search" id="search" class="form form-control" placeholder="Ingrese código">
												<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Buscar">
											</div>
										</div>
									</form>
								</div>	
								<div class="col-md-12 pt-5 mb-2">
									<!-- Large modal -->
									<button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target=".bd-example-modal-lg1">Asignar Curso</button>
									<a class="btn btn-success" href="asign-single-student-subjects.php"> Asignar curso a estudiante individual</a>
									<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">Asignar curso a estudiante</h4>
													</div>
													<div class="modal-body">
														<form action="student.php" method="POST" enctype="multipart/form-data">
															<div class="row mt-3">
																<!-- <div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Select Course:*</label>
																		<select class="browser-default custom-select" name="course_code" required="">
																			<option >Select Course</option>
																			<?php
																				/* $query="select course_code from courses";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																				} */
																			?>
																		</select>
																	</div>
																</div> -->
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1" required>Ingresar Semestre:*</label>
																		<input type="text" name="semester" class="form-control">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1">Código del estudiante:*</label>
																		<input type="text" name="roll_no" class="form-control">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1">Curso:*</label>
																		<select class="browser-default custom-select" name="subject_code" required="">
																			<option >Seleccione curso</option>
																			<?php
																				$query="select subject_code from course_subjects";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>	
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save2">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
															</div>
														</form>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Código</th>
									<th>Nombre del estudiante</th>
									<th>Dirección Actual</th>
									<!-- <th>Session</th> -->
									<!-- <th>Course ID</th> -->
									<th>Admisión</th>
									<th>Perfil</th>
									<th colspan="1">Operaciones</th>
								</tr>
								<?php 
								$query="select first_name,middle_name,admission_date,last_name,current_address,session,roll_no,form_b ,profile_image,course_code from student_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["roll_no"] ?></td>
										<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
										<td><?php echo $row["current_address"] ?></td>
										<!-- <td><?php /* echo $row["session"] */ ?></td>
										<td><?php /* echo $row["course_code"] */ ?></td> -->
										<!-- date_format($date,"Y/m/d H:i:s"); -->
										<td><?php echo date("Y-M-d",strtotime($row["admission_date"])); ?></td>
										<td><?php  $profile_image= $row["profile_image"] ?>
										<img height='50px' width='50px' src=<?php echo "images/$profile_image"  ?> >
										</td>
										<td width='170'> 
											<?php 
												echo "<a class='btn btn-primary' href=display-student.php?roll_no=".$row['roll_no'].">Profile</a> 
												<a class='btn btn-danger' href=delete-function.php?roll_no=".$row['roll_no'].">Delete</a> "
											?>
										</td>
									</tr>
								<?php }
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