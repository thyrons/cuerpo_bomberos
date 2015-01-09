<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	
	session_start();

	$data = $_SESSION['usuario'];
	
	echo $data;
?>