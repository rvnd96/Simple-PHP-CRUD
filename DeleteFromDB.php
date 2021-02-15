<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete from Database</title>
	<style type="text/css">
		input[type="text"],textarea {
			border: 1px solid dashed;
			background-color: rgb(221,216,212);
			width: 480px;
			padding: .5em;
			font-size: 1.0em;
		}
		input[type="submit"] {
			color: white;
			font-style: 1.0em;
			background-color: purple;
			width: 200px;
			height: 40px;
			border: 2px solid black;
			border-radius: 10px;
			font-weight: bold;
			margin-top: 10px;
		}
		.fieldInfo {
			color: rgb(12, 23, 144);
			font-size: 1em;
		}
		.success, caption {
			color: green;
			font-size: 1.4em;
			font-weight: bold;
		}
		.AddENameANDSSN {
			color: red;
			font-size: 1.4em;
			font-weight: bold;
			margin-left: 450px;
		}
		div {
			width: 500px;
			margin-left: 450px;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<h2 class="success"> <?php echo @$_GET['Deleted']; ?> </h2>
	<table width="1000" border="5" align="center">
		<caption>View From Database</caption>
		<tr>
			<th>ID</th>
			<th>Employee Name</th>
			<th>SSN</th>
			<th>Department</th>
			<th>Salary</th>
			<th>Home Address</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>

	<?php  
		/*Setting up the connection*/
		$Connection = mysqli_connect('localhost', 'root', '');
		$Selected = mysqli_select_db($Connection, 'record');

		/*View SQL Query*/
		$ViewQuery = "SELECT * FROM emp_record";

		$stmt = mysqli_query($Connection, $ViewQuery);

		/*$nums = mysqli_num_rows($stmt);*/

		while ($DataRows = mysqli_fetch_array($stmt)) {
			$ID = $DataRows['id'];
			$Ename = $DataRows['ename'];
			$SSN = $DataRows['ssn'];
			$Dept = $DataRows['dept'];
			$Salary = $DataRows['salary'];
			$HomeAddr = $DataRows['homeaddress'];
		
	?>
		<tr>
			<td> <?php echo $ID; ?> </td>
			<td> <?php echo $Ename; ?> </td>
			<td> <?php echo $SSN; ?> </td>
			<td> <?php echo $Dept; ?> </td>
			<td> <?php echo $Salary; ?> </td>
			<td> <?php echo $HomeAddr; ?> </td>
			<td><a href="Update.php?Update=<?php echo $ID; ?> ">UPDATE</a></td>
			<td><a href="Delete.php?Delete=<?php echo $ID; ?> ">DELETE</a></td>
			
		</tr>
	<?php } ?>
	</table>

</body>
</html>