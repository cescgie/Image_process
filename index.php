<?php
	if(isset($_FILES['image'])){
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$expensions= array("jpeg","jpg","png");
		if(in_array($file_ext,$expensions)=== false){
			//$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size > 2097152){
		$errors[]='File size must be excately 2 MB';
		}
		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"files/".$file_name);
			//echo "Success";
		}else{
			print_r($errors);
		}
	}
	if(isset($_FILES['template'])){
		$errors= array();
		$file_name2 = $_FILES['template']['name'];
		$file_size2 =$_FILES['template']['size'];
		$file_tmp2 =$_FILES['template']['tmp_name'];
		$file_type2=$_FILES['template']['type'];
		$file_ext2=strtolower(end(explode('.',$_FILES['template']['name'])));

		$expensions2= array("jpeg","jpg","png");
		if(in_array($file_ext2,$expensions2)=== false){
			//$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size2 > 2097152){
		$errors2[]='File size must be excately 2 MB';
		}
		if(empty($errors2)==true){
			move_uploaded_file($file_tmp2,"template/".$file_name2);
			//echo "Success";
		}else{
			print_r($errors2);
		}
	}
?>

<!DOCTYPE html>
<html>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Own Style -->
	<link rel="stylesheet" type="text/css" href="static/foto.css" />

	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<!-- Own Script -->
	<script type="text/javascript" src="static/script.js"></script>

	<body style="margin-left:100px;margin-top:50px;margin-right:100px;">

		<table>
			<tr>
		    <td align="center" bgcolor="FAE9E3">
					<br>
		    	<h3>TEMPLATE</h3>
		    	<hr>
					<table>
						<tr>
							<td align="left">
								<form action="" method="POST" enctype="multipart/form-data">
									<input type="file" name="template" />
									<input type="submit"/>
								</form>
							</td>
							<td align="left">
								<button onclick="location.href='deleteAction.php?path=template'">DELETE TEMPLATE</button><br><br>
							</td>
						</tr>
					</table>
					<br>
					<table>
						<tr>
							<td align="center">
								<a href="#" onclick="WidthMinTmp()"><span class="glyphicon glyphicon-minus"></span></a>
								<span class="width_span">WIDTH</span>
								<a href="#" onclick="widthPlusTmp()"><span class="glyphicon glyphicon-plus"></span></a>
							</td>
							<td align="center">
								<a href="#" onclick="heightMinTmp()"><span class="glyphicon glyphicon-minus"></span></a>
								<span class="height_span">HEIGHT</span>
								<a href="#" onclick="heightPlusTmp()"><span class="glyphicon glyphicon-plus"></span></a>
							</td>
						</tr>
					</table>
		    </td>
		    <td align="center" bgcolor="E3F4FA">
				<br>
				<h3>IMAGE</h3>
				<hr>
				<table>
					<tr>
						<td align="left">
							<form action="" method="POST" enctype="multipart/form-data">
								<input type="file" name="image" />
								<input type="submit"/>
							</form>
						</td>
						<td align="left">
							<button onclick="location.href='deleteAction.php?path=files'">DELETE IMAGE</button><br><br>
						</td>
					</table>
					<br>
				<table>
					<tr>
						<td align="center">
							<a href="#" onclick="WidthMinImg()"><span class="glyphicon glyphicon-minus"></span></a>
							<span class="width_span">WIDTH</span>
							<a href="#" onclick="widthPlusImg()"><span class="glyphicon glyphicon-plus"></span></a>
						</td>
						<td align="center">
							<a href="#" onclick="heightMinImg()"><span class="glyphicon glyphicon-minus"></span></a>
							<span class="height_span">HEIGHT</span>
							<a href="#" onclick="heightPlusImg()"><span class="glyphicon glyphicon-plus"></span></a>
						</td>
					</tr>
				</table>
		    </td>
		  </tr>
		</table>
		<div id="main" style="background-color: #F9F6F4;">
			<div id="gallery">
				<?php
					$dir1="template/";
					$dh1 = opendir($dir1);
					$filenames1=null;
					while ($file1 = readdir ($dh1))
					{
						if(substr($file1,0,1)!=".")
						$filenames1[] = $file1;
					}
					if($filenames1){
						foreach($filenames1 as $file1)
						{
							echo '<img id="pic-1" class="pic" style="width:500px;height:500px;top:0px;left:0px;" src="template/'.$file1.'">';
						}
					}
				?>
				<?php
					$dir2="files/";
					$dh2 = opendir($dir2);
					$filenames2 = null;
					while ($file2 = readdir ($dh2))
					{
						if(substr($file2,0,1)!=".")
						$filenames2[] = $file2;
					}
					if($filenames2){
						foreach($filenames2 as $file2)
						{
							echo '<img id="pic-2" class="pic" style="width:250px;height:250px;top:350px;left:350px;" src="files/'.$file2.'">';
						}
					}
				?>
			</div>
		</div>
		<script type="text/javascript">
			var zoomDelta = 10;
            var currentWidthTmp = 500;
            var currentHeightTmp = 500;
            var currentWidthImg = 250;
            var currentHeightImg = 250;
            var tmpIMG = document.getElementById('pic-1');
            var imgPic = document.getElementById('pic-2');

            function widthPlusTmp(){
            	currentWidthTmp += zoomDelta;
            	tmpIMG.style.width = currentWidthTmp+"px";
            }
            function WidthMinTmp(){
            	currentWidthTmp -= zoomDelta;
            	tmpIMG.style.width = currentWidthTmp+"px";
            }
            function heightPlusTmp(){
            	currentHeightTmp += zoomDelta;
            	tmpIMG.style.height = currentHeightTmp+"px";
            }
            function heightMinTmp(){
            	currentHeightTmp -= zoomDelta;
            	tmpIMG.style.height = currentHeightTmp+"px";
            }
            function widthPlusImg(){
            	currentWidthImg += zoomDelta;
            	imgPic.style.width = currentWidthImg+"px";
            }
            function WidthMinImg(){
            	currentWidthImg -= zoomDelta;
            	imgPic.style.width = currentWidthImg+"px";
            }
            function heightPlusImg(){
            	currentHeightImg += zoomDelta;
            	imgPic.style.height = currentHeightImg+"px";
            }
            function heightMinImg(){
            	currentHeightImg -= zoomDelta;
            	imgPic.style.height = currentHeightImg+"px";
            }
		</script>
	</body>
</html>
