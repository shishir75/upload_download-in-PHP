<?php
	$db = mysqli_connect("localhost","root","", "up_down");

	if(isset($_REQUEST["submit"]))
	{
		$file=$_FILES["file"]["name"];
		$tmp_name=$_FILES["file"]["tmp_name"];
		$path="upload/".$file;
		$file1=explode(".",$file);
		$ext=$file1[1];
		$allowed=array("jpg","png","gif","pdf","wmv","zip");
		if(in_array($ext,$allowed))
		{
		 move_uploaded_file($tmp_name,$path);
		 $result = mysqli_query($db, "INSERT INTO upload(file) VALUES('$file')");
		 if ($result) {
		 	echo 'File Uploaded Successfully';
		 }else {
		 	echo "File not Uploaded";
		 }
		}else {
			echo "Invalid Format";
		}
	}

?>


<form enctype="multipart/form-data" method="post">

File Upload:<input type="file" name="file">
<input type="submit" name="submit" value="upload">

</form>