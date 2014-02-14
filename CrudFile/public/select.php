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
$archivostring = file_get_contents('usuarios.txt');
$filas = explode("\n",$archivostring);

echo "<a href=\"/usuarios.php?action=insert\">Insertar Usuario</a>";
echo "<br/>";
echo "<table border=1>";

foreach($filas as $fila)
{
	echo "<tr>";
	$columnas = explode(',',$fila);
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
	
	echo "<a href=\"/usuarios.php?action=update\">Update</a>";
	echo "&nbsp;";
	echo "<a href=\"/usuarios.php?action=delete\">Delete</a>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";