<?php
$host 	= "localhost";
$db 		= "cadastro";
$user 	= "root";
$pass 	= "";
$conn 	= mysqli_connect($host,$user,$pass,$db);


if (mysqli_connect_errno()){
	echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_client=utf8');
mysqli_query($conn,'SET character_set_results=utf8');

?>