<?php 

// echo '<pre> $filas: ';
// print_r($filas);
// echo '</pre>;'
// print_r ($filas);
// echo '</pre>';
// die;

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
<h2> --- /application/views/users/insert_duties.php ---</h2>
<form method="post" enctype="multipart/form-data">
	
	<LABEL>introduce el nombre para la nueva tarea</LABEL>
	<ul>
		<li>
			Id: <input type="hidden" name="idduty" value="-"/>
		</li>
	
		<li>
			<input type="text" name="duty" value=""/>
		</li>

		
		<li>
			Submit: <input type="submit" name="submit"/>
		</li>
		<li>
			Reset: <input type="reset" name="reset"/>
		</li>
	</ul>
</form>