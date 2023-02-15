<?php
set_include_path('/var/www/html/src');
include 'config.php';

$sql = "SELECT * FROM t_board";
$result = $connect -> query($sql);

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
	<title>Bulletin Board</title>
	<link type="text/css" rel="stylesheet" href="board.css" />
</head>

<body>
<div id="wrap">
	<div id="content">
		<h2>Bulletin Board List</h2>
		<div class="search">
			<form>
				<select name="">
					<option value="">subject</option>
					<option value="">message</option>
				</select>
				<input type="text" value=""/>
				<input type="button" value="Search"/>
			</form>
		</div>
		<!-- <div style="padding-top: 30px;" id="buttons"> -->
		<!-- 	<input type="button" onclick"window.location.href=./write.html" value="Write"/> -->
		<!-- 	<input type="button" value=""/> -->
		<!-- </div> -->

		<div style="padding-top: 30px;">
			<ul>
				<a href="./write/write.php" target=_blank>Write</a>
			</ul>
		</div>

		
		<table class="board_list">
		<caption>&nbsp;</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Subject</th>
				<th>Writer</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if($result->num_rows>0) {
				while($query_result=$result->fetch_assoc()) {
				$index = $query_result['index'];
				$subject = $query_result['subject']; 
				$writer = $query_result['writer'];
				$date = $query_result['registerTime'];
				$date = date('d/m/Y');
		?>
			<tr>
				<!--<td>$no</td>--><!--post index. retrieved from db-->
				<td><?php echo $index; ?></td><!--post index. retrieved from db-->
				<td class="subject">
					<!--<input type="checkbox" id="" name="" value="" title="" /> -->
					<a href="./view/view.php?index=<?php echo $index; ?>"><?php echo $subject; ?></a>
				</td><!--subject or post title. retrieved from db-->
				<!--<td>writer's name</td>--><!--writer's name. retrieved from db-->
				<td><?php echo $writer; ?></td><!--writer's name. retrieved from db-->
				<td><?php echo $date; ?></td><!--written date. retrieved from db. Timestamp in DB. display format:dd/mm/yyyy-->
			</tr>
		<?php	
			}
		}
		?>
		</tbody>
		</table>

		<div class="paging">
			&lt; prev 
			<strong>1</strong>
			<a href="#">2</a> 
			<a href="#">3</a> 
			<a href="#">4</a> 
			<a href="#">5</a> 
			<a href="#"> next</a> &gt;
		</div>
	</div>
</div>
</body>
</html>

