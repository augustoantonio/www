<?php
// Set usuarios.txt content on $archivostring
// Create $filas array. Each element is a line of text with values comma separated
// Create link to usuarios.php insert function?
// Draws table
// Do the following foreach element of $filas array. Each element is named $fila inside
// Foreach only works on arrays & objects.
	// draw row
	// Create array $columnas from string $fila. Searches commas as element separator.
	// Storage image at $image and cuts it from array $columnas
	// Do the following foreach element of $columnas array. Each element is named $columna inside
	// Draw col
	// Print data $columna
	// Show image
	// Show buttons
// Close table

include '/functions.php';

$archivostring = file_get_contents('usuarios.txt');
$filas = explode("\n",$archivostring);
// $index2delete = calcIdAvailable($filas);
//echo "$index2delete";
//die;
echo "<a href=\"/usuarios.php?action=insert\">Insertar Usuario</a>";
echo "<br/>";
echo "<table border=1>";

foreach($filas as $fila)
{
	
	
	echo "<tr>";
	//dibuja cada elemento del primer array en su celda
	$columnas = explode(',',$fila);
	// la imagen es el ultimo elemento, la borra
	$image = array_pop($columnas);
	foreach ($columnas as $columna)
	{
		echo "<td>";
		echo $columna;
		echo "</td>";	
	}
	
	echo "<td>";
	echo "<img width=\"100px\" src=\"".$image."\"/>";	
	echo "</td>";
	echo "<td>";
	// esta es la id del registro a borrar
	$iidToWorkWith = explode (",",$fila);
	echo $iidToWorkWith[0];
	$query_string = 'fila='.urlencode($fila);
	echo '<a href="/update.php?'.htmlentities($query_string).'">Update</a>'.' ';
	echo '<a href="/delete.php?'.htmlentities($query_string).'">Delete</a>';
	/*
	$num = 5;
	$location = 'tree';
	
	$format = 'There are %d monkeys in the %s';
	echo sprintf($format, $num, $location);
	?>
		
<?php
$query_string = 'foo=' . urlencode($foo) . '&bar=' . urlencode($bar);
echo '<a href="mycgi?' . htmlentities($query_string) . '">';
?>
	
	echo "<a href=\"/update.php?id=\">Updat</a>";
	echo "<a href=\"/delete.php\">Delet</a>";
	
	echo "<a href=\"/usuarios.php?action=update\">Update</a>";
echo "&nbsp;";
echo "<a href=\"/usuarios.php?action=delete\">Delete</a>";
echo "</td>";
*/
}
echo "</table>";