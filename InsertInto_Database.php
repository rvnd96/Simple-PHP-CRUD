<?php  

if (isset($_POST["Submit"])) {

	if (!empty($_POST["EName"]) && !empty($_POST["SSN"])) {


		/*Setting up the connection*/
		$Connection = mysqli_connect('localhost', 'root', '');
		$Selected = mysqli_select_db($Connection, 'record');

		/*declare variables for get the values from the form*/
		$EName = $_POST["EName"];
		$SSN = $_POST["SSN"];
		$Dept = $_POST["Dept"];
		$Salary = $_POST["Salary"];
		$HomeAddress = mysqli_real_escape_string($Connection, $_POST["HomeAddress"]); //To prevent MYSQL INJECTIONS

		/*Insert Into SQL Query*/
		$Query = "INSERT INTO emp_record(ename, ssn, dept, salary, homeaddress)
					VALUES('$EName', '$SSN','$Dept','$Salary','$HomeAddress')"; //the query 
		$stmt = mysqli_prepare($Connection, $Query); //creating statement
		$Execute = mysqli_stmt_execute($stmt); //execute the statement

		/*Success message*/
		if ($Execute) {
			echo '<span class="success">Record Has Been Added!</span>';
		}
	} else {
		echo '<span class="AddENameANDSSN">Please add at least Name and SSN!</span>';
	} 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert into database</title>
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
		<form action="InsertInto_Database.php" method="POST">
			<fieldset>
				<span class="fieldInfo">Employee Name: </span><br><input type="text" name="EName" value=""> <br>
				<span class="fieldInfo">Social Security Number: </span><br><input type="text" name="SSN" value=""> <br>
				<span class="fieldInfo">Department: </span><br><input type="text" name="Dept" value=""> <br>
				<span class="fieldInfo">Salary: </span><br><input type="text" name="Salary" value=""> <br>
				<span class="fieldInfo">Home Address: </span><br><textarea name="HomeAddress" id="" cols="30" rows="10"></textarea> <br>

				<input type="submit" name="Submit" value="Submit your record"> <br>
			</fieldset>
		</form>
	</div>
</body>
</html>