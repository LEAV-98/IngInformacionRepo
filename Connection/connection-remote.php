<?php 
	$host = "bvkgjzsuuachv90vukle-mysql.services.clever-cloud.com";
	$user = "uyup3tigpqverpeu";
	$password = "1201RRyTYAj6wHDTatAe";
	$name_database = "bvkgjzsuuachv90vukle";
	$con=mysqli_connect($host,$user,$password,$name_database);
	if(!$con)
	{
		echo "Connection is not Successfully";
	}
?>