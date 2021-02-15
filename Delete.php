<?php  
/*Setting up the connection*/
	$Connection = mysqli_connect('localhost', 'root', '');
	$Selected = mysqli_select_db($Connection, 'record');

$Delete_Record_ID = $_GET['Delete'];
$DeleteQuery = "DELETE FROM emp_record WHERE id='$Delete_Record_ID'";

$stmt = mysqli_prepare($Connection, $DeleteQuery); //creating statement

$Execute = mysqli_execute($stmt);

if ($Execute) {
	echo '	<script>
				window.open("DeleteFromDB.php?Deleted=Record Deleted Successfully", "_self")
			</script>';
}

?>