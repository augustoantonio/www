<?php 

// echo '<pre> $filas: ';
// print_r($filas);
// echo '</pre>';

// echo '<pre> $get: ';
// print_r($_GET);
// echo '</pre>';


// recorrer RECORDSET
// hacer FUNCION.
foreach ($filas as $key => $value)
{
// cada $value es un array de valores si le decimos que
// cuando coincida la clave de recorrido con el valor que le digamos
// guarde el contenido del campo duty en la variable $
	if (!$key==$_GET['id']) {
		$duty2update= $value['duty'];
		//var_dump($value);
	}
}




/*
 * 
  received into a$filas:
  Array [0] => Array ( [dutyid] => 1 [dutyname] => aprendiz de CRUD de Proyectos )
  		[1] => Array ( [dutyid] => 2 [dutyname] => aprendiz de CRUD de Equipos )
  		[2] => Array ( [dutyid] => 3 [dutyname] => aprendiz de CRUD de Cargos )
  		[3] => Array ( [dutyid] => 4 [dutyname] => aprendiz de CRUD de empresa )
  		[4] => Array ( [dutyid] => 5 [dutyname] => director de proyectos )
  		[5] => Array ( [dutyid] => 6 [dutyname] => ) ) 
  		
  		
  		
  		<?=$freeindex?>
 */

 ?>
 <?php ?>
<h2> /application/views/users/insert_duties.php</h2>
<form method="post" enctype="multipart/form-data">
	
	<LABEL>introduce el nombre para la nueva tarea</LABEL>
	<ul>
		<li>
			Id: <input type="hidden" name="idduty" value="<?=$_GET['id']?>"/>
		</li>
	
		<li>
			<input type="text" name="duty" value="<?=$duty2update?>"/>
		</li>

		
		<li>
			Submit: <input type="submit" name="submit"/>
		</li>
		<li>
			Reset: <input type="reset" name="reset"/>
		</li>
	</ul>
</form>