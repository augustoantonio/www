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
 * Returns int first available id field free on $stxtFile
 * @param string $sfileName, name of the txt file to work with
 * @return string $filename
 * @return null
 */
function calcIndexByFilename ($stxtFile)
{
if (is_file($stxtFile))
{
	// load file data into an array $aContent. Each array element is a personal register.
	$aContent = explode("\n",file_get_contents($stxtFile));
	// number or registers +1. I don´t know why.
	$iLength = count($aContent);
	// checks all the index length for an empty element.
	for ($x =0; $x <= ($iLength - 1); $x++)
	{
		// each loop cheks if seat is taken then looks for another.
		// when finds one empty that´s it: $x.
		if (!$aContent[$x]){
			//este $i es el indice que hay que usar. la condición de fin de bucle aqui tb.
			$x++;
			return $x;
		/*
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		echo '<pre>';
		print_r($aContent);
		echo '</pre>';
		*/
		}
	}
}
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

/**
 * Calculate id available. 
 * @param array $aData
 * @return number
 */
function calcIdAvailable ($aData)
 {
// number or registers +1. I don´t know why.
$iLength = count($aData);
// checks all the index length for an empty element.
for ($x =0; $x <= ($iLength - 1); $x++)
{
// each loop cheks if seat is taken then looks for another.
// when finds one empty that´s it: $x.
if (!$aData[$x])
	//este $i es el indice que hay que usar. la condición de fin de bucle aqui tb.
//código para a
$x++;
return $x;
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($aContent);
echo '</pre>';
*/
}
}
?>