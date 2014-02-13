F = 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
<hr/>

<?php
$topnum = 45;

function sfibonacci ($num){
	// each fibonacci number is the add of his own two predecessors so
	$x1 = 0;
	$x2 = 1;
	$x3 = $x1 + $x2;
	// first and second ones don´t have predecessors
	echo ("F = 0, 1, ");
	// use while if you only know the beggining condition
	while ($x3 <= $num){
		//for the new fibonacci the predecessors changes
		echo ("$x3".", ");
		$x1 = $x2;
		$x2 = $x3;
		$x3 = $x2 + $x1;
	}
	return;
}

echo (sfibonacci($topnum));

/*
echo "F=0,1,";

$max =45;

$f1=0;
$f2=1;
$f3=$f1+$f2;
while($f3<=$max)
{
echo $f3.',';
$f1=$f2;
$f2=$f3;
$f3=$f1+$f2;

}
*/
?>