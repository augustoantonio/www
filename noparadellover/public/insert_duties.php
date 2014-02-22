<?php 
	print_r($usuario);

?>
<h2> --- insert_duties.php ---</h2>
<form method="post" enctype="multipart/form-data">
	<ul>
		<li>
		
			Id: <LABEL for="iduser"><?=isset($usuario['iduser'])?$_GET['id']:'-';?></LABEL>
			
		</li>
		<li>
			Username:<LABEL for="username"><?=isset($usuario['username'])?$usuario['username']:'';?> </LABEL>
		
		</li>
		<li>
			Nombre: <input type="text" name="name" value="<?=isset($usuario['name'])?$usuario['name']:'';?>"/>
		</li>
		<li>
			Apellidos: <input type="text" name="lastname" value="<?=isset($usuario['lastname'])?$usuario['lastname']:'';?>"/>
		</li>
		<li>
			Email: <input type="text" name="email" value="<?=isset($usuario['email'])?$usuario['email']:'';?>"/>
		</li>

		<li>
			Descripcion: <textarea rows="10" cols="10" name="description"><?=isset($usuario['description'])?$usuario['description']:'';?></textarea>
		</li>
		
			</li>

		<li>
			Proyectos: 
			<select multiple name="languages[]">
			<option value="english" <?=(isset($usuario['languages'])&&in_array('english', $usuario['languages']))?'selected':'';?>>English</option>
			<option value="galego" <?=(isset($usuario['languages'])&&in_array('galego', $usuario['languages']))?'selected':'';?>>Galego</option>
			<option value="spanish" <?=(isset($usuario['languages'])&&in_array('spanish', $usuario['languages']))?'selected':'';?>>Español</option>
			</select>
		</li>
			
		<li>
			Submit: <input type="submit" name="submit"/>
		</li>
		<li>
			Reset: <input type="reset" name="reset"/>
		</li>
		<li>
			Button: <input type="button" name="button" value="Un boton"/>
		</li>
	
	</ul>
</form>