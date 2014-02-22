<form method="post" enctype="multipart/form-data">
	
	<h3> -- ..//application/views/users/insert_duties.php --</h3> 

<!--	<?php 	echo '<pre> $_GET: ';
				print_r($_GET);
			echo '<pre>';
			echo '<pre> $_POST: ';
			print_r($_POST);
			echo '<pre>';
	?>
-->	
	
	<ul>
		<li>
			Id: <input type="hidden" name="iduser" value="<?=isset($usuario['iduser'])?$_GET['id']:'-';?>"/>
		</li>
		<li>
			Username: <input type="text" name="username" value="<?=isset($usuario['username'])?$usuario['username']:'';?>"/>
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
			Password: <input type="password"  name="password"/>
		</li>
		<li>
			Descripcion: <textarea rows="10" cols="10" name="description"><?=isset($usuario['description'])?$usuario['description']:'';?></textarea>
		</li>
		<li>
			Ciudad: <select name="cities_idcity">
			<option value="1" <?=(isset($usuario['cities_idcity'])&&$usuario['cities_idcity']=='santiago')?'selected':'';?>>Santiago</option>
			<option value="2" <?=(isset($usuario['cities_idcity'])&&$usuario['cities_idcity']=='vigo')?'selected':'';?>>Vigo</option>
			<option value="3" <?=(isset($usuario['cities_idcity'])&&$usuario['cities_idcity']=='acoruña')?'selected':'';?>>A Coruña</option>
			</select>
		</li>

		
		<li>
			Foto: <input type="file" name="photo"/>
			<?php 
			if(isset($usuario['photo']))
			{
				echo "<img width=\"100px\" src=\"".$usuario['photo']."\"/>";
				echo "<input type=\"hidden\" name=\"photo\" value=\"".$usuario['photo']."\"/>";	
			}
			?>
		</li>
		
		<li>
			Submit: <input type="submit" name="submit"/>
		</li>
		<li>
			Reset: <input type="reset" name="reset"/>
		</li>
		<li>
		
			Button: <input type="button" name="communicate" value="send to <?=isset($usuario['username'])?$usuario['username']:'';?>"/>
			<!--   Button: <input type="button" name="comunicate to " value="Un boton"/>-->
		</li>
	
	</ul>
</form>