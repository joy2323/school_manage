
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
											                            <th><div> Read / Download</div></th>
																		</tr>';

				while($row=mysqli_fetch_array($squeryino))
				{
					$title=$row['title'];
					$class=$row['class'];
				    $dli.='<tr>
							<td>'.++$sn.'</td>
							<td>'.$title.'</td>
							<td>'.$class.'</td>
							<td><a href="pm/book/'.$title.'">Read & Download</a></td>
						   </tr></center>';


				}
				//$dl='<a href=#>'.$name.'</a>';
				//echo $dli;

	//upload
		if (isset($_FILES["ssfile"]["name"]))
		{
			$name=$_FILES["ssfile"]["name"];
			$cls=$_POST["fileclass"];
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

				$sqlino= "INSERT INTO upload (id,title,description,author,class) VALUES ('','$name','','','$cls')";
				$queryino = mysqli_query($con, $sqlino);
				$dl='<a href="book.php?file='.$name.'">'.$name.'&emsp;&emsp;&emsp;&emsp;'.$cls.'</a>';
				//$dl='<a href=#>'.$name.'</a>';
			//	echo $dl;
				echo '   Successfully Uploaded';
				}
				else
				{
				echo "There was an error uploading. Please try again";
				}
				}
				else
				{
				echo 'Please choose a file.';
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
<div><h3>Library</h3><?php echo $dli;?>
</div>
</html>
