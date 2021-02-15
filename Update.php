<?php  
	
	/*Setting up the connection*/
	$Connection = mysqli_connect('localhost', 'root', '');
	$Selected = mysqli_select_db($Connection, 'record');

	$Update_Record = $_GET['Update'];

	$UpdateQuery = "SELECT * FROM emp_record WHERE id='$Update_Record'";

	$stmt = mysqli_query($Connection, $UpdateQuery);


	while ($DataRows =  mysqli_fetch_array($stmt)) {
		$UpdateID = $DataRows['id'];
		$EName = $DataRows['ename'];
		$SSN = $DataRows['ssn'];
		$Dept = $DataRows['dept'];
		$Salary = $DataRows['salary'];
		$HomeAddr = $DataRows['homeaddress'];
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
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
			background-color: blue;
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
		.success {
			color: green;
			font-size: 1.4em;
			font-weight: bold;
			margin-left: 450px;
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
	<div>
		<form action="Update.php?UpdateID=<?php echo $UpdateID;  ?>" method="POST">
			<fieldset>
				<span class="fieldInfo">Employee Name: </span><br><input type="text" name="EName" value="<?php echo $EName; ?>"> <br>
				<span class="fieldInfo">Social Security Number: </span><br><input type="text" name="SSN" value="<?php echo $SSN; ?>"> <br>
				<span class="fieldInfo">Department: </span><br><input type="text" name="Dept" value="<?php echo $Dept; ?>"> <br>
				<span class="fieldInfo">Salary: </span><br><input type="text" name="Salary" value="<?php echo $Salary; ?>"> <br>
				<span class="fieldInfo">Home Address: </span><br><textarea name="HomeAddress" id="" cols="30" rows="10"><?php echo $HomeAddr; ?></textarea> <br>

				<input type="submit" name="Submit" value="Update your record"> <br>
			</fieldset>
		</form>
	</div>
</body>
</html>

<?php  
	/*This PHP clock is for editing the data that you got in your form.*/
	$Connection = mysqli_connect('localhost', 'root', '');
	$Selected = mysqli_select_db($Connection, 'record');

	if (isset($_POST['Submit'])) {
		$UpdateID = $_GET['UpdateID'];
		$EName = $_POST['EName'];
		$SSN = $_POST['SSN'];
		$Dept = $_POST['Dept'];
		$Salary = $_POST['Salary'];
		$HomeAddr = $_POST['HomeAddress'];

		$UpdateQuery = "UPDATE emp_record SET 
									ename ='$EName',
									ssn = '$SSN',
									dept = '$Dept',
									salary = '$Salary',
									homeaddress = '$HomeAddr' WHERE id='$UpdateID' ";

		$stmt = mysqli_prepare($Connection, $UpdateQuery);
		$Execute = mysqli_stmt_execute($stmt);

		if ($Execute) {
			function redirect_to($NewLocation) {
				header("Location:".$NewLocation);
			}
			redirect_to("Update_IntoDB.php?Updated=Record has been updated successfully.");
		}

	}

?>