
<?php
set_include_path('/var/www/html/src');
include 'config.php';

	//Use for multiple checkbox
	/*
	$field_list = array_values($_POST['checkbox']);
	var_dump(implode(' ,',$field_list));
	//$sql = "DELETE FROM `t_board` WHERE `index` IN ";
	$sql = "(" . implode(' ,',$field_list) . ")"; 
	$result = $connect->query($sql);

	*/

	if(isset($_GET['index'])) {
		$index = $_GET['index'];
		$sql = "DELETE FROM `t_board` WHERE `index`='$index'";
		$result=$connect->query($sql);

	if($result==TRUE) {
		echo "Record deleted successfully";
	} else {
			echo "Error:" . $sql . "<br>" . $connect->error;	
		}
	}
?>
		<form>
			<a href="../"><input type="button" value="List"/></a>
		</form>
