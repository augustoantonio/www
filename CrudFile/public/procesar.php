
		<!-- procesar belongs to MODEL  -->

<?php
// three debugs
// import functions.php otherwise functions won´t work

// Create a variable $photo_name. rename() checks and obtains a available name
// $destino server path
//complete path with name
// update final file name to $_FILES
// upload photo to server
// write txt file
// redirect to select.php

echo "<pre> GET: ";
	print_r($_GET);
echo "</pre>";

echo "<pre> POST: ";
print_r($_POST);
echo "</pre>";

echo "<pre> FILES: ";
print_r($_FILES);
echo "</pre>";
include '/functions.php';

$photo_name = renameFile($_FILES['photo']['name'],
			 $_SERVER['DOCUMENT_ROOT']);
$destino = $_SERVER['DOCUMENT_ROOT'];
$partes_ruta = pathinfo($destino."/".$photo_name);

$_FILES['photo']['name'] = $photo_name;

uploadFile($photo_name, $destino, $_FILES['photo']);
$_POST['id'] = calcIndexByfilename('usuarios.txt');
echo "<pre> Post despues: ";
print_r($_POST);
echo "</pre>";
insert2Txt($_POST,'usuarios.txt');
header("location: /select.php/");
?>