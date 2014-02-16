<?php
$persona = array ();
// $persona[];
$persona[1] = "Augusto";
$persona['Apellidos'] = 'Sanchez';

$persona = array ('nombre' => "Augusto",
					'apellido' =>"Sanchez",
					'edad' => 23,
					'33' => 'otro mas',
					'y este',
					//aquí crea un elemento 35 con valor 1 y 
					1,2 =>'otro raro',
					1.2 => 'sobreescribe',
					'direccion' => array (1, 'Rúa da Rosa', 'santiago')
);

foreach ($persona as $key => $value){
	echo $key.": ".$value;
	echo $key.": ".print_r($value);
	echo "<br/";
}
foreach($persona as $per){
	
}
echo $persona['edad'];

echo "<pre>";
print_r($persona);
echo "</pre>";
