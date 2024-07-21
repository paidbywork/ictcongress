<?php 
	// always make sure to include the database file
	require 'db.php';

	// QUERY to RETRIEVE and DISPLAY the database
	$students = "SELECT * FROM registration";
	$queryStudents = mysqli_query($conn, $students);

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

		.student-list {

			box-shadow: 0px 7px 29px 0px rgba(100, 100, 111, 0.2);
			padding: 5% 2%;
			width: 900px;
			margin: 0 auto;
			border-radius: 4px;
			box-sizing: border-box;
		}

		.student-list table, 
		.student-list table tr,
		.student-list table td  {
			border: 1px solid #e1e1e1;
		}

		.student-list table {
			width: 100%;
			border-collapse: collapse;
		}


		.student-list table td  {
			padding: 10px 20px;
		}

		tr:nth-child(odd) {background-color: #fff;}
		tr:nth-child(even) {background-color: #f2f2f2;}

	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			

			<div class="student-list">

				<div>
					<a href="add-student.php">Register a Student Here</a> | <a href="index.php">Back to Menu</a>
				</div>

				<div>
					<h2>Student List</h2>
				</div>

				<?php

					if (mysqli_num_rows($queryStudents) > 0) {

				?>

				<table>
						<tr>
								<td>ID #</td>
								<td>Name</td>
								<td>Campus</td>
								<td>Amount Paid</td>
								<td>Actions</td>
						</tr>
				<?php
						while($row = mysqli_fetch_assoc($queryStudents	)) {
				?>

						<tr>
			                <td><?php echo $row['idNum']; ?></td>
			                <td><?php echo $row['studFName'] . " " . $row['studLName']; ?></td>
			                <td><?php echo $row['campus']; ?></td>
			                <td><?php echo $row['amountPaid']; ?></td>

                			<td>
			                    <button type="button">
			                         <a href="edit-user.php?id=<?php echo $idno; ?>">Edit</a>
			                    </button>

								<button type="button">
			                         <a href="delete.php?id=<?php echo $idno; ?>">Delete</a>
			                    </button>
									</td>
           				 </tr>


            <?php

						}

					}


				?>

			</div>
		</div>
	</div>

</body>
</html>