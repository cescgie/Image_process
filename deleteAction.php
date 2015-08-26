<?php
	$path = $_GET["path"];
    echo $path;

	$filez1 = glob($path.'/*'); // get all file names
	foreach($filez1 as $filez){ // iterate files
	if(is_file($filez))
		 unlink($filez); // delete file
	}
			
	header("Location: index.php")
?>
