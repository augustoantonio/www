<?php
echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";

echo "<pre>POST: ";
print_r($_POST);
echo "</pre>";

echo "<pre>FILES: ";
print_r($_FILES);
echo "</pre>";

//separar por comas
$data=implode(',',$_POST)."\n";
$destino = $_SERVER['DOCUMENT_ROOT'];
$photo_name= $_FILES['photo']['name']; 
$partes
$a=0;
while (file_exists($destino."/"._$photo_name){
	$a++;
	$photo_name = $photo_name
}
//averiguar el nombre de la foto
	// Mientras que el nombre fichero exista en destino
		// si existe
			// aumenta nombre de fichero
			// bucle hasta nombre valido
		// si no existe
			// salir con el contador
//escribir fichero


//escribir a un archivo de texto
file_put_contents('usuarios.txt', $data, FILE_APPEND);
//subir la foto revisaresta sentenciabien
// move_uploaded_file([$_FILES]['photo']['tmp_name'],[$_SERVER]['DOCUMENT_ROOT']."/".[$_FILES]['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'],
$_SERVER['DOCUMENT_ROOT']."/".
		$_FILES['photo']['name']
);


?>