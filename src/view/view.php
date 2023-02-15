<?php
set_include_path('/var/www/html/src');
include 'config.php';

if(isset($_GET['index'])) {

	$index = $_GET['index'];

	$sql = "SELECT * FROM t_board WHERE `index` = $index";

	$result = $connect -> query($sql);

	/* print_r($sql); */

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
	<title>Board View</title>
	<link type="text/css" rel="stylesheet" href="../board.css" />
</head>

<body>
<?php	
if($result->num_rows>0) {
	while($query_result=$result->fetch_assoc()) {
		$no = $query_result['index'];
		$subject = $query_result['subject']; 
		$writer = $query_result['writer'];
		$message = $query_result['message'];
		$filename = $query_result['filename'];
		$date = $query_result['registerTime'];
		$date = date('d/m/Y');
?>
<div id="wrap">
	<div id="content">
		<h2>Board View</h2>
			<ul class="board_detail">
				<li>
					<dl>
						<dt>Writer</dt>
						<dd><?php echo $writer; ?></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Subject</dt>
						<dd><?php echo $subject; ?></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt> Message </dt>
						<dd class="message"><?php echo $message; ?></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>File</dt>
						<dd><a href="#"><?php echo $filename; ?></a></dd>
					</dl>
				</li>
				<li class="submit">
					<!--<div>
					<ul>
						<li class="bot-buttons"><a href="../"><input type="button" value="List"/></a></li>
						<li class="bot-buttons"><a href="../modify/modify.php"><input type="button" value="Modify"/></a></li>
					</ul>
					</div>-->
					<form>	
						<a href="../"><input type="button" value="List"/></a>
						<a href="../modify/modify.php?index=<?php echo $no; ?>"><input type="button" value="Modify"/></a>
					</form>
				</li>
			</ul>
	</div>
</div>
<?php
		}
	}
?>
</body>
</html>

