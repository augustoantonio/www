<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

</head>

<body>
<form id="contac-form" action="procesar.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="id" value="">

<ul>
	<li>
		<label> Nombre: </label>
		<input type="text" name="fname" id="fname" value =""/>
	</li>
	<li>
		<label> Apellidos: </label>
		<input type="text" name="sname" id="sname" value =""/>
	</li>
	<li>
		<label> E-mail: </label>
		<input type="text" name="email" id="email" value =""/>
	</li>
	<li>
		<label> Contraseña: </label>
		<input type="password" name="passw" id="passw" value =""/>
	</li>
	<li>
		<label> Descripción: </label>
		<textarea name="description" id="description" rows="4" cols="25"></textarea>
	</li>
	<li>
		<label> Nombre: </label>
		<select name="ciudad" form="idform.php">
			<option value="Santiago"> Santiago </option>
			<option value="Vigo">Vigo</option>
		</select>
	</li>
	<li>
		<label> Sexo:<br/> </label>
		<input type="radio" name="sex" value="O">Otros<br>
		<input type="radio" name="sex" value="M">Mujer<br>
		<input type="radio" name="sex" value="H">Hombre<br>
	</li>
	<li>
Foto: <input type="file" name="photo"/>
</li>
<li>
	
Submit: <input type="submit" name="photo"/>
</li>
<li>
Reset: <input type="reset" name="reset"/>
</li>
<li>
Button: <input type="button" name="button" value="Un boton"/>
</li>
	
	
	
	
</ul>




</form>
</body>


</html>
