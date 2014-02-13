
<?php
$path_parts = pathinfo('/www/htdocs/inc/lib.inc.php');

echo $path_parts['dirname'], "<br/>";
echo $path_parts['basename'], "<br/>";
echo $path_parts['extension'], "<br/>";
echo $path_parts['filename'], "<br/>"; // since PHP 5.2.0
?>

