<?php
set_include_path('/var/www/html/src');
include 'config.php';

if (isset($_POST['update'])) {
	$index = $_GET['index']; //used _GET because we are getting the data from db to target where update will go and not updating the index value in db
	$writer = $_POST['writer'];
	$subject = $_POST['subject'];
	/* $date = $_POST['registerTime']; */
	$message = $_POST['message'];
	$filename = $_POST['filename'];

	$sql = "UPDATE `t_board` SET `writer`='$writer', `subject`='$subject',  `message`='$message', `filename`='$filename' WHERE `index`= $index";
	/* echo 'sql ' . $sql; */
	/* print_r($sql); */

	/* mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); */

	/* $result = $connect -> query($sql) or die($connect->error); //mysqli object oriented style */
	$result = $connect -> query($sql); //mysqli object oriented style

	if ($result == TRUE) {
		/* echo "Record updated successfully."; //for header to work we must disable this echo */
		header('Location: ../view/view.php?index=' . $index);
	} else {
		echo "Error" . $sql . "<br>" . $connect->error;
	}
	/* $connect -> close(); //causes uncaught error mysqli object is already closed */
	?>
	<script type="text/javascript"> //alternative way if header redirect is not working
	/* window.location="../view/view.php?index=<?php echo $index; ?>"; */
	/* alert('zz'); */
	</script>
	<?php	
}



//code for testing connection of query
/*
if ($result = $connect -> query($sql)) {
	echo "Returned rows are: " . $result -> num_rows;
	// Free result set
	$result -> free_result();
}

$connect -> close();
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Update Board</title>
	<link type="text/css" rel="stylesheet" href="../board.css" />
</head>

<body>
<form action="" method="post">
<?php	
/* if($result->num_rows>0) { */ //produces error for bool on num_rows

	if(isset($_GET['index'])) {

		$index = $_GET['index'];

		$sql = "SELECT * FROM t_board WHERE `index` = $index";

		$result = $connect -> query($sql);

		/* print_r($result); */


		if(!empty($result->num_rows) && $result->num_rows>0) {
			while($query_result=$result->fetch_assoc()) {
				$index = $query_result['index'];
				$subject = $query_result['subject']; 
				$writer = $query_result['writer'];
				$message = $query_result['message'];
				$filename = $query_result['filename'];
				/* $date = $query_result['registerTime']; */
				/* $date = date('d/m/Y'); */
			}
?>
<div id="wrap">
	<div id="content">
		<h2>Board Modify</h2>
			<ul class="board_detail">
				<li>
					<dl>
						<dt>Writer</dt>
						<dd><input type="text" name="writer" value="<?php echo $writer; ?>"/></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Subject</dt>
						<dd><input type="text" name="subject" value="<?php echo $subject; ?>"/></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Message</dt>
						<dd class="message"><textarea rows="8" name="message" cols="40"><?php echo $message; ?></textarea></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>File</dt>
						<dd><input type="text" name="filename" value="<?php echo $filename; ?>" class="fileupload" /><input type="button" value="Search"/></dd>
					</dl>
				</li>
				<li class="submit">
					<input type="submit" name="update" value="Update"/>
					<a href="../view/view.php?index=<?php echo $index; ?>"><input type="button" value="Cancel"/></a>
				</li>
			</ul>
	</div>
</div>
</form>
</body>
</html>
<?php
		} 
	}
?>
