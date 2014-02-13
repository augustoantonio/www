<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
<?php
//dot A($x1,$y1)
$x1 = 1;
$y1 = 0;
//dot B ($x2,$y2)
$x2	= 2;
$y2 = 2;
//dot C ($x3, $y3)
$x3 = 1;
$y3 = 10;

/* A and B makeas a line
 * //$d = (x-x1)*(y2-y1) - (y-y1)*(x2-x1)
 * if $d is positive dot is under line, if negative is over line
 * if 0 belongs to the line
 */

function cPosition ($ax,$ay,$bx,$by,$cx,$cy){
	
	$m = ($by - $ay) / ($bx - $ax);
	// $b = ($m * $ax) + $by;

	echo ("Los puntos: A (".$ax.",".$ay.") y B (".$bx.",".$by.")");
	// echo (" forman la recta: y = ".$m."x + ".$b);
	//$d = (x-x1)*(y2-y1) - (y-y1)*(x2-x1);
	
	$d = ($cx - $ax) * ($by - $ay) - ($cy - $ay) * ($bx - $ax);
	print ("$d");
	
	if ($d > 0) 
		echo ("debajo ");
	else if ($d < 0)
		echo ("encima "); 
	if ($d == 0)
		echo ("en la linea");
}
cPosition ($x1, $y1, $x2, $y2, $x3, $y3);	
	
	
	/* not working code
	$r = ($m*$cx) - ($m*$ax) + $ay;
	echo ("Esto es variable r "."$r");
	echo "<hr/>";
	echo "La pendiente es: "."$m"."<br/>";

	echo ("El punto C (".$cx.",".$cy.") está ");
	
	if ($d == 0)
		echo (" en la linea");
		else if ($d > 0)
			echo ("debajo.");
	else
			echo ("encima.");
	
		
	switch ($d){
		case 0:
			echo "en la recta ".$r;
			break;
		case < 0:
			echo "encima de la recta ".$r;
			break;
		case 1:
			echo "por debajo de la recta ".$r;
		}
*/


?>

</body>
</html>