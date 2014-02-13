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
echo ("<hr/>");
//averiguar el nombre de la foto

// implode: moves data form to $data variable, comma separated
// find out the name of the file with extension
// root folder of the site
// pathinfo creates array with different parts of the file name separated
$data = implode (',',$_POST)."\n";
$photoname = $_FILES['photo']['name'];
$serverlocation = $_SERVER["DOCUMENT_ROOT"];
$partes_ruta = pathinfo($serverlocation."/".$photoname);

//Display values
echo ("<hr/>");
echo ("$photoname")."<br/>";
echo ("$serverlocation")."<br/>";
// echo ("$data")."<br/>";
echo ("<pre>");
print_r($partes_ruta);
echo  ("</pre>");
echo ("<hr/>");

// Mientras que el nombre fichero exista en destino
// si existe
// aumenta nombre de fichero
// bucle hasta nombre valido
// si no existe
// salir con el contador
$a = 0;
while (file_exists($serverlocation."/".$photoname)){
	$a++;
	$photoname = $partes_ruta['filename']."-".$a.".".$partes_ruta['extension'];
}
// write final_name at POST. For what?
$_POST =$photoname;

// upload file to server
move_uploaded_file($_FILES['photo']['temp_name'], $serverlocation."/".$photoname);

//escribir fichero
file_put_contents($photoname, $data, FILE_APPEND);

/*
//s
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


//write a string to a file
file_put_contents('usuarios.txt', $data, FILE_APPEND);

//subir la foto revisaresta sentenciabien
// move_uploaded_file([$_FILES]['photo']['tmp_name'],[$_SERVER]['DOCUMENT_ROOT']."/".[$_FILES]['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'],
$_SERVER['DOCUMENT_ROOT']."/".
		$_FILES['photo']['name']
);
/*
<?php

//Debugs
echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";

echo "<pre>POST: ";
print_r($_POST);
echo "</pre>";

echo "<pre>FILES: ";
print_r($_FILES);
echo "</pre>";





// Averiguar el nombre de la foto
$photo_name = $_FILES['photo']['name'];
$destino = $_SERVER['DOCUMENT_ROOT'];
$partes_ruta = pathinfo($destino."/".$photo_name);



//Mientras que el nombre del fichero exista en destino
$a=0;
while(file_exists($destino."/".$photo_name))
{
	// Aumentar nombre de fichero
	$a++;
	// Hasta obtener un nombre valido
	$photo_name=$partes_ruta['filename'].
	"_".
	$a.
	".".
	$partes_ruta['extension'];
}

// Inyectar nombre_final en post.
$_POST[]=$photo_name;

// Separar por comas
$data=implode(',',$_POST)."\n";

// Subir la foto
move_uploaded_file($_FILES['photo']['tmp_name'],
$destino."/".$photo_name
);


// Escribir(agregar) a un archivo de texto
file_put_contents('usuarios.txt', $data, FILE_APPEND);
*/
?>