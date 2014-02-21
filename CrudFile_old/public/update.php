<?php 

echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";
$data = implode(",", $_GET);
echo "<pre>data: ";
print_r($data);
echo "</pre>";
$fields = explode(",", $data);
echo "<pre>fields: ";
print_r($fields);
echo "</pre>";

echo '<ul>';
echo '<li>';
echo 'id: <input type="hidden" value="'.$fields[0].'" name="id">';
// Id: <input type="hidden" value="1" name="id"/>
echo '</li>';
echo '<li>';
echo 'Nombre: <input type="text" name="name" value="'.$fields[1].'"">';
// Id: <input type="hidden" value="1" name="id"/>
echo '</li>';
echo '<li>';
echo 'Apellidos: <input type="text" name="lastname" value="'.$fields[2].'"">';
// Id: <input type="hidden" value="1" name="id"/>
echo '</li>';
echo '<li>';
echo 'Email: <input type="text" name="name" value="'.$fields[2].'"">';
// Id: <input type="hidden" value="1" name="id"/>
echo '</li>';
echo '<li>';
echo 'Password: <input type="password" name="password" value="'.$fields[3].'"">';
// Id: <input type="hidden" value="1" name="id"/>
echo '</li>';
echo '<li>';
echo 'Descripcion: <textarea rows="10" cols="10" 
		name="description" value="'.$fields[4].'"></textarea>';
// Id: <input type="hidden" value="1" name="id"/>
echo '</li>';

echo '<li>';
echo 'Ciudad: <select name="cities">
		<option value="santiago">Santiago</option>
		'.$fields[1].'"">';
// Id: <input type="hidden" value="1" name="id"/>
echo '</li>';

/*

<li>
Descripcion: <textarea rows="10" cols="10" name="description"> </textarea>
</li>
<li>
Ciudad: <select name="cities">
<option value="santiago">Santiago</option>
<option value="vigo">Vigo</option>
<option value="acoruña">A Coruña</option>
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
<option value="spanish">Español</option>
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
echo '</ul></form></body></html>';
*/
?>
