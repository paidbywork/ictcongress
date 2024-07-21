<?php

	// call the database file
	require 'db.php';

	// perform the insert without going to another page
	if (isset($_POST['register'])) {

		$idno = $_POST['idno'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$campus = $_POST['campus'];
		$amount = $_POST['amount'];
		
		$insert = "INSERT INTO registration (idNum, studFName, studLName, amountPaid, campus, attended) VALUES('$idno', '$fname', '$lname', '$amount', '$campus', 'no' )";
		
		$queryInsert = mysqli_query($conn, $insert);
		
		if (!$queryInsert) {
		
			echo "Cannot insert student, try again!";
		} else {
			  
			echo '<script type="text/javascript">
					alert("Student added!");
					window.location = "registration.php";
				</script>';
							
			}
		}
		
		

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style>
		a {
			text-decoration: none;
		}

		body {

			background-color: #fff;

		}


		.row {

			padding: 10% 1%;

		}


		.registration {

			box-shadow: 0px 7px 29px 0px rgba(100, 100, 111, 0.2);
			padding: 1% 2%;
			width: 600px;
			margin: 0 auto;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="text"] {
			border: 1px solid #e1e1e1;
			padding: 12px 40px;
			width: 80%;
		}

		select {
			border: 1px solid #e1e1e1;
			padding: 12px 40px;
			width: 95%;

		}

		input[type="submit"] {
			padding: 16px 40px;
			width: 95%;
			background-color: darkblue;
			color: #fff;
			border: 0;
			font-weight: 700;
		}

		input[type="submit"]:hover {
			cursor: pointer;
			background-color: #333;
		}

	</style>
</head>
<body>

	<div class="container">

		<div class="row">
			<div class="registration">
				<form method="POST">

					<p><input type="text" name="idno" placeholder="ID Number" /></p>
					<p><input type="text" name="fname" placeholder="First Name" /></p>
					<p><input type="text" name="lname" placeholder="Last Name" /></p>
					<p><select name="campus">

					    <option value="main">Main</option>
			            <option value="banilad">Banilad</option>
			            <option value="uclm">LM</option>

					</select></p>
					<p><input type="text" name="amount" placeholder="Amount Paid" /></p>

					<p><input type="submit" name="register" value="Register" /></p>

					<p><a href="registration.php">Back to Student List</a></p>

				</form>
			</div>
		</div>
		
	</div>

</body>
</html>