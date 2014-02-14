		<!-- Functions belongs to MODEL  -->

<?php

/**
* Rename file with a counter
*
* @param string $original_name
* @param string $path
* @return string $final_name
*/
function renameFile($photo_name, $destino)
{
// Find out photo´s name
// While file exists
	// check file number available for new file name
	$partes_ruta = pathinfo($destino."/".$photo_name);
$a=0;
while(file_exists($destino."/".$photo_name))
{
	$a++;
	$photo_name=$partes_ruta['filename']."_".$a.".".$partes_ruta['extension'];
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
// upload photo to server
move_uploaded_file($fileData['tmp_name'],$path."/".$name);
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
// Do the following for each element of $datafile array. Each element is named $filename inside
	// If !array
		// add as element to arraysalida[]
	// If is array 
		// separate values with pipes
// Convert array to comma separated string
// Append to file $filename
$arraysalida=array();
foreach ($datafile as $value)
{
	if(!is_array($value))
		$arraysalida[]=$value;
	else
		$arraysalida[]=implode('|',$value);
}
$data=implode(',',$arraysalida)."\n";
file_put_contents($filename, $data, FILE_APPEND);
return null;
}