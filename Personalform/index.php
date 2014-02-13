<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
<!-- id, nombre, apellidos, email, password, description, ciudad, sexo,
     mascotas, idiomas, foto, botón enviar, botón reset, botón en blanco -->

<form id="contac-form" action="procesar.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="id" value="">


<ul>
	<li>
		<label> Nombre: </label>
		<input type="text" name="firstname" id="firstname" value =""/>
	</li>
	<li>
		<label> Apellidos: </label>
		<input type="text" name="surname" id="surname" value =""/>
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
		<label> Ciudad: </label>
		<select name="ciudad" form="idform.php">
			<option value="Lugo">Lugo</option>
			<option value="Santiago">Santiago</option>
			<option value="Vigo">Vigo</option>
		</select>
	</li>
	<li>
		<label> Mascotas: </label>
		Gato<input type="checkbox" value="Gato" name="pets[]">
		Perro<input type="checkbox" value="Perro" name="pets[]">
		Pez<input type="checkbox"  value="Pez" name="pets[]">
	</li>
	<li>
		<label>Idiomas:<br/></label>
		<select multiple name="languajes[]">
			<option value="chinesse">Chino</option>
			<option value="spanish">Español</option>
			<option value="english">Inglés</option>
			<option value="russian">Ruso</option>
			
		</select>
	<li>
		<label> Sexo:<br/> </label>
		<input type="radio" name="sex" value="H">Hombre<br>
		<input type="radio" name="sex" value="M">Mujer<br>
		<input type="radio" name="sex" value="O">Otros<br>
	</li>
	
	<li>
		<label>Foto: </label>
		<input type="file" name="photo"/>
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
</body>
</html>