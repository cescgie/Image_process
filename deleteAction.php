<?php
	$path = $_GET["path"];
	
	$filez1 = glob($path.'/*'); // get all file names
	foreach($filez1 as $filez){ // iterate files
	if(is_file($filez))
		 unlink($filez); // delete file
	}

	echo("<script>location.href = '/image_process/';</script>");
?>
