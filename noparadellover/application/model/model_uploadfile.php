<?php

// 	echo '<pre>: $_GET:';
// 		print_r($_GET);
// 	echo '</pre>'.'</br>';

// 	echo '<pre>: $_POST:';
// 	print_r($_POST);
// 	echo '</pre>'.'</br>';

// 	echo '<pre>: $_FILES:';
// 	print_r($_FILES);
// 	echo '</pre>'.'</br>';
// 	die;

/**
 * Rename file with a counter
 *
 * @param string $original_name
 * @param string $path
 * @return string $final_name
 */
function renameFile($photo_name, $destino)
{
	if(!isset($photo_name)||$photo_name=='')
		return null;
	// Averiguar el nombre de la foto
	$partes_ruta = pathinfo($destino."/".$photo_name);

	//Mientras que el nombre del fichero exista en destino
	$a=0;
	while(file_exists($destino."/".$photo_name))
	{
		// Aumentar nombre de fichero
		$a++;
		// Hasta obtener un nombre valido
		$photo_name=$partes_ruta['filename'].
		"_".$a.".".$partes_ruta['extension'];
	}
	return $photo_name;
	
}

/**
 * Upload file to directory
 * @param string $name
 * @param string $path
 * @param array $fileData $_FILES data
 * @return null
 */
function uploadFile($name, $path, $fileData)
{
	// Subir la foto
	move_uploaded_file($fileData['tmp_name'],
	$path."/".$name
	);
	return null;
}