<!DOCTYPE table PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

</head>

<body>

<table border=1>
<tr>
	<td>1</td>
	<td>2</td>
	<td>3</td>
</tr>
<tr>
	<td>2</td>
	<td>4</td>
	<td>6</td>
</tr>
</table>
<hr/>

<?php
// number of rows and columns
$nrows= 5;
$ncol = 6;

function dibujatabla ($rows, $columns){
	echo "<table border=1>";
	
	//use FOR when you know start and ending condition
	//notice that counter starts at 0 to create table headers
	
	// this bucle creates the rows
	for ($i = 0; $i <= $rows; $i++){
		
		echo "<tr>";
		// this bucle creates columns
		for ($j =0; $j <= $columns; $j++){
			// if both zero no value
			if ($i == 0 && $j == 0 )
				echo ("<td>"."-"."</td>");
			// Row zero so fill with the number of columns
			elseif ($i == 0)
			echo ("<td>".$j."</td>");
			// Column zero so fill with the number of rows
			elseif ($j == 0)
			echo ("<td>".$i."</td>");
			// The main table, no zero values so multiply 
			else
				echo ("<td>".$i*$j."</td>");
		}
		echo "</tr>";
	}
	
	echo "</table>";
	return;
}
dibujatabla($nrows, $ncol);
/*
$filas=5;
$columnas=4;

echo "<table border=1>";
for($i=0;$i<=$filas;$i++)
{
echo "<tr>";
for($m=0;$m<=$columnas;$m++)
{
if ($i==0 && $m==0)
echo "<td>-</td>";
else if ($i==0)
echo "<td>$m</td>";
else if ($m==0)
echo "<td>$i</td>";
else
echo "<td>".$i*$m."</td>";	
}
echo "</tr>";
}
echo "</table>";
*/
?>
</body>
</html>