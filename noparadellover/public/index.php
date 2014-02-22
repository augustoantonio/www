<?php 
ob_start();
			include('index.php');
			$content=ob_get_contents();
			ob_end_clean();
			
?>
