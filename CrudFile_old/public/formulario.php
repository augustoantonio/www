<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
		<!-- formulario belongs to VIEWS  -->
<head>
</head>
<body>
<!-- id, name, surname, email, password, description, city, sex, pets
	languages, photo, send button, reset button, empty button -->

<form action="procesar.php" method="post" enctype="multipart/form-data">
<ul>
	<li>
		Id: <input type="hidden" value="1" name="id"/>
	</li>
	<li>
		Nombre: <input type="text" name="name" value="">
	</li>
	<li>
		Apellidos: <input type="text" name="lastname" value=""/>
	</li>
	<li>
		Email: <input type="text" name="email" value=""/>
	</li>
	<li>
		Password: <input type="password" name="password" value=""/>
	</li>
	<li>
		Descripcion: <textarea rows="10" cols="10" name="description"> </textarea>
	</li>
	<li>
		Ciudad: <select name="cities">
					<option value="santiago">Santiago</option>
					<option value="vigo">Vigo</option>
					<option value="acoru�a">A Coru�a</option>
				</select>
	</li>
	<li>
		Sexo:
			Otros: <input type="radio" value="o" name="gender"/>
			Mujer: <input type="radio" value="m" name="gender"/>
			Hombre: <input type="radio" value="h" name="gender"/>
	</li>
	<li>
		Mascotas:
			Gato <input type="checkbox" value="gato" name="pets[]"/>
			Perro <input type="checkbox" value="perro" name="pets[]"/>
			Tigre <input type="checkbox" value="tigre" name="pets[]"/>
			Lobo <input type="checkbox" value="lobo" name="pets[]"/>
		</li>
	<li>
		Idiomas:
			<select multiple name="languages[]">
				<option value="english">English</option>
				<option value="galego">Galego</option>
				<option value="spanish">Espa�ol</option>
			</select>
	</li>
	<li>
		Foto: <input type="file" name="photo"/>
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