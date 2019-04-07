
<?php 
				//display available books
				$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal") or die("Connection problem.");
				$ssqlino= "SELECT * FROM upload ";
				$squeryino = mysqli_query($con, $ssqlino);
				$sn=1;
				$dli='<center><table width="60%" border="3" cellspacing="1" cellpadding="4">
																	<tr bgcolor="#e0e0e0">
																	
											                            <th><div>SN</div></th>
											                            <th><div> Book Title</div></th>
											                            <th><div> Class</div></th>
											                            <th><div> Read / Download (Free)</div></th>
											                            <th><div> Hard Copy Price</div></th>
																		</tr>';
				
				while($row=mysqli_fetch_array($squeryino))
				{
					$title=$row['title'];
					$class=$row['class'];
					$price=$row['price'];
				    $dli.='<tr>
							<td>'.++$sn.'</td>			
							<td>'.$title.'</td>			
							<td>'.$class.'</td>
							<td><a href="pm/book/'.$title.'">Read & Download</a></td>
							<td>'.$price.'</td>
						   </tr></center>';
				
				   
				}
				//$dl='<a href=#>'.$name.'</a>';
				//echo $dli;
	
	//upload
		if (isset($_FILES["ssfile"]["name"]))
		{
			$name=$_FILES["ssfile"]["name"];
			$cls=$_POST["fileclass"];
			$price=$_POST["price"];
			//$size=$_FILES['file']['size'];
			//$type=$_FILES['file' ]['type'];
			$tmp_name=$_FILES['ssfile']['tmp_name'];   
	
			if(isset($name))
			{
				if(!empty($name))
				{
				//$location='download/';
				if(move_uploaded_file($tmp_name,$name))
				{
				
				$sqlino= "INSERT INTO upload (id,title,description,author,class,price) VALUES ('','$name','','','$cls','$price')";
				$queryino = mysqli_query($con, $sqlino);
				$dli.='<tr>
							<td>'.++$sn.'</td>			
							<td>'.$title.'</td>			
							<td>'.$class.'</td>
							<td><a href="pm/book/'.$title.'">Read & Download</a></td>
							<td>'.$price.'</td>
						   </tr></center>';
				//$dl='<a href=#>'.$name.'</a>';
				echo $dl;
				echo '  <h4 style="color:green;"> Successfully Uploaded</h4>';
				}
				else
				{
				echo '<h4 style="color:red;">There was an error uploading. Please try again</h4>';
				}
				}
				else
				{
				echo '<h4 style="color:red;">Please choose a file.</h4>';
				}
		
			}
		}
	
	if (isset($_GET['file'])&& basename($_GET['file'])==$_GET['file'])
	{
		$filename=$_GET['file'];
		$path=$filename;
		if(file_exists($path)&& is_readable($path))
		{
			$size=filesize($path);
			header('Content-Type: application/octet-stream');
			header('Content-Length:'.$size);
			header('Content-Disposition:attachment;filename='.$filename);
			header('Content-Transfer-Encoding:binary');
			
			//open the file in binary read-only mode
			$file=@ fopen($path,'rb');
			if($file)
			{
				fpassthru($file);
				exit;
				
			}
			
			
		}
		
	}


?>
<html>
<div style="border:auto;">
Add New Books
<form action="#" method="POST" enctype="multipart/form-data">
	<select name="fileclass">
		<option value="select">-Select the Class this book is for-</option>
		<option value="Jss1">Jss1</option>
		<option value="Jss2">Jss2</option>
		<option value="Jss3">Jss3</option>
		<option value="SSS1">SSS1</option>				
		<option value="SSS2">SSS2</option>				
		<option value="SSS3">SSS3</option>				
	</select>&emsp;<br><br>
	<input name="price" type="text" placeholder="Price in Naira"><br><br>
	<input name="ssfile" type="file" ><br><br>
	<input type="submit" value="Upload"><br><br>
	
	</form>

<div><h3>Library</h3><?php echo $dli;?>
</div>
</div>
</html>