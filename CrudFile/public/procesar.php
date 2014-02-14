
		<!-- procesar belongs to MODEL  -->

<?php
// debugs
echo "<pre> GET: ";
	print_r($_GET);
echo "</pre>";

echo "<pre> POST: ";
print_r($_POST);
echo "</pre>";

echo "<pre> FILES: ";
print_r($_FILES);
echo "</pre>";

// import functions.php otherwise functions won´t work
include '/functions.php';


// rename() checks and obtains valid name
// $destino server path
//complete path with name
$photo_name = renameFile($_FILES['photo']['name'], $_SERVER['DOCUMENT_ROOT']);
$destino = $_SERVER['DOCUMENT_ROOT'];
$partes_ruta = pathinfo($destino."/".$photo_name);

// update final file name to $_FILES
$_FILES['photo']['name'] = $photo_name;

// upload photo to server
uploadFile($photo_name, $destino, $_FILES['photo']);

//write txt file
insert2Txt($_POST,'usuarios.txt');

// redirect to select.php
// header("location: /select.php/");
?>