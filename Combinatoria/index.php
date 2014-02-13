<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


</head>
<body>
<?php 
$m = 7;
$n = 4;
function factorial ($num){
	$factor = 1;
	for ($i = $num; $i >= 1; $i--) {
		echo ("$i"." ");
		$factor *= $i;	
	}
	return $factor;
	echo ("$factor");
}

$combinatoria = factorial($m)/((factorial($n)*(factorial($m - $n))));
echo ("<hr/>");
print ("$combinatoria");
?>




</body>
</html>
