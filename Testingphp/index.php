		<!-- Functions belongs to MODEL  -->
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

		
<html>
<head>
</head>
<body>

		
<?php

function calculateIndex ($stxtFile)
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
		if (!$aContent[$x])
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
else 
	return null;		
}

$indice = calculateIndex('usuarios.txt');
echo $indice;
?>

</body>
</html>