<?php
set_include_path('/var/www/html/src');
include 'config.php';

if (isset($_POST['submit'])) {
	/* $index = $_POST['index']; */
	$writer = $_POST['writer'];
	$subject = $_POST['subject'];
	/* $date = $_POST['registerTime']; */
	$message = $_POST['message'];
	$filename = $_POST['filename'];

	/* $sql = "INSERT INTO `t_board`(`writer`,`subject`, `registerTime`,`message`,`filename`) */
	/* 		VALUES ('$writer', '$subject', '$date', '$message', '$filename')"; */
	
	$sql = "INSERT INTO `t_board`(`writer`,`subject`, `message`,`filename`)
			VALUES ('$writer', '$subject',  '$message', '$filename')";

	$result = $connect -> query($sql); //mysqli object oriented style

	if ($result == TRUE) {
		echo "New record created successfully";
	} else {
	echo "Error" . $sql . "<br>" . $connect->error;
	}
	$connect->close();
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Bulletin board</title>
	<link type="text/css" rel="stylesheet" href="../board.css" />
</head>

<body>
<!-- form syntax required to insert data into mysql --> 
<form action="" method="POST">
<div id="wrap">
	<div id="content">
		<h2>Board Write</h2>
		<div style="padding-top: 30px;">
			<ul>
				<a href="../" target=_blank>Home</a>
			</ul>
			<br>
		</div>
			<ul class="board_detail">
				<li>
					<dl>
						<dt>Writer</dt>
						<dd><input type="text" name="writer"/></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Subject</dt>
						<dd><input type="text" name="subject"/></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Message</dt>
						<dd class="message"><textarea rows="8" cols="40" name="message" ></textarea></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>File</dt>
						<dd><input type="text" name="filename" class="fileupload"/>
							<input type="button" value="Search"/></dd> 
					</dl>
				</li>
				<li class="submit">
					<input type="submit" name="submit" value="Submit"/>
					<input type="button" value="Cancel"/>
				</li>
			</ul>
	</div>
</div>
</form>
</body>
</html>

