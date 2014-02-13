<?php
// implode: joins the content of an array on a string
//          with his values separated by commaseparated


$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);

echo $comma_separated; // lastname,email,phone
echo ("<br/>");
// Empty string when using an empty array:
var_dump(implode('hello', array())); // string(0) ""
echo("<hr/>");

// print_r: debugger purposes. Print human readable information about a variable.
echo ("<pre>");
$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
print_r ($a);
echo ("</pre>")
?>

?>
