<?php
// TODO: review "-" isue
// TODO: view don�t refresh images when file changes. check rename_photo function.
/**
 * Rename file with a counter
 *  
 * @param string $original_name
 * @param string $path
 * @return string $final_name
 */
function renameFile($photo_name, $destino)
{
	// Averiguar el nombre de la foto
	$partes_ruta = pathinfo($destino."/".$photo_name);
		
	//Mientras que el nombre del fichero exista en destino
	$a=0;
	while(file_exists($destino."/".$photo_name))
	{
		// Aumentar nombre de fichero
		$a++;
		// Hasta obtener un nombre valido
		$photo_name=$partes_ruta['filename'].
		"_".$a.".".$partes_ruta['extension'];
	}	
	return $photo_name;
}

/**
 * Upload file to directory
 * @param string $name
 * @param string $path
 * @param array $fileData $_FILES data
 * @return null
 */
function uploadFile($name, $path, $fileData)
{
	// Subir la foto
	move_uploaded_file($fileData['tmp_name'],
						$path."/".$name
	);
	return null;
}

/**
 * Insert data into text file
 * @param array $data array with data
 * @param string $filename
 * @return null
 */
function insert2Txt($datafile, $filename)
{
	$arraysalida=array();
	// Para cada elemento del array POST
	foreach ($datafile as $value)
	{
		// Si no es array
		if(!is_array($value))
			// Enviar a arraysalida
			$arraysalida[]=$value;
		// Si es array
		else
			// Dividir por pipes y
			// enviar a arraysalida
			$arraysalida[]=implode('|',$value);
	}
	
	// Separar por comas
	$data=implode(',',$arraysalida)."\n";
		
	// Escribir(agregar) a un archivo de texto
	file_put_contents($filename, $data, FILE_APPEND);
	
	return null;
}

/**
 * Read user by id from txt file
 * @param unknown $id
 * @return array
 */
function getUserData($id)
{
	// Tomar id
	// Leer en un string el archivo txt
	$data = file_get_contents('usuarios.txt');
	// Convertir el string en array
	$data = explode("\n",$data);
	
	// Leer la fila id
	// Convertir la fila en array usuario
	$usuario=explode(',',$data[$id]);
	foreach($usuario as $key => $value)
	{
		if(strpos($value, '|'))
		{
			$arrayout[]=explode('|',$value);
		}
		else
		{
			$arrayout[]=$value;
		}	
		
	}
	
	// Mapeo de datos al array asociativo
	$arrayout['id']=$arrayout['0'];
	$arrayout['name']=$arrayout['1'];
	$arrayout['lastname']=$arrayout['2'];
	$arrayout['email']=$arrayout['3'];
	$arrayout['password']=$arrayout['4'];
	$arrayout['description']=$arrayout['5'];
	$arrayout['cities']=$arrayout['6'];
	$arrayout['gender']=$arrayout['7'];
	$arrayout['pets']=is_array($arrayout['8'])?$arrayout['8']:array($arrayout['8']);
	$arrayout['languages']=is_array($arrayout['9'])?$arrayout['9']:array($arrayout['9']);
	$arrayout['photo']=$arrayout['11'];
	
	return $arrayout;
	// Retornar el array
}

/**
 * Get data from text file
 * 
 * @param string $filename
 * @return array:
 */
function getArrayFromTxt($filename)
{
	// Leer el archivo de texto en un string
	$data=file_get_contents($filename);
	// Convertir en array
	$data=explode("\n",$data);
	return $data;
}

/**
 * Convertir los nuevos datos en una linea valida
 * @param arary $data
 * @return array 
 */
function getUserLine($data)
{
	
	foreach ($data as $key => $value)
	{
		if(is_array($value))
		{
			$arrayout[$key]=implode('|',$value);
		}
		else
		{
			$arrayout[$key]=$value;
		}
	
	}
	return $arrayout;
}

/**
 * Mapeo de datos al array asociativo
 * @param unknown $arrayout
 * @return unknown
 */
function mapUser2File($arrayout)
{
	$arrayuser['0']=$arrayout['id'];
	$arrayuser['1']=$arrayout['name'];
	$arrayuser['2']=$arrayout['lastname'];
	$arrayuser['3']=$arrayout['email'];
	$arrayuser['4']=$arrayout['password'];
	$arrayuser['5']=$arrayout['description'];
	$arrayuser['6']=$arrayout['cities'];
	$arrayuser['7']=$arrayout['gender'];
	$arrayuser['8']=$arrayout['pets'];
	$arrayuser['9']=$arrayout['languages'];
	$arrayuser['10']='Updated';
	$arrayuser['11']=$arrayout['photo'];
	
	return $arrayuser;
}

/**
 * Write data to txt file 
 * @param string $filename
 * @param array $data
 * @return null
 */
function wrt2File($filename, $data)
{
	// Convertir en un string todos los datos
	$data=implode("\n", $data);
	// Sobreescribir el archivo de texto
	file_put_contents($filename, $data);
	return;
}










