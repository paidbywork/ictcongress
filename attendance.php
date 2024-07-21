<?php 

	require 'db.php';

	if(isset($_POST['go'])) {

		$id = $_POST['idno'];
		$showstudents = "SELECT * FROM registration WHERE idNum = $id";
		$res2 = mysqli_query($conn, $showstudents);

		if (mysqli_num_rows($res2) > 0) {

						
		} else {

							echo '<script type="text/javascript">
			        alert("User is not yet registered!");
			        
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

		.attendance-list {

			box-shadow: 0px 7px 29px 0px rgba(100, 100, 111, 0.2);
			padding: 2% 2%;
			width: 900px;
			margin: 0 auto;
			border-radius: 4px;
			box-sizing: border-box;
		}

		.attendance-list table, 
		.attendance-list table tr,
		.attendance-list table td  {
			border: 1px solid #e1e1e1;
		}

		.attendance-list table {
			width: 100%;
			border-collapse: collapse;
		}


		.attendance-list table td  {
			padding: 10px 20px;
		}

		tr:nth-child(odd) {background-color: #fff;}
		tr:nth-child(even) {background-color: #f2f2f2;}

	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			

			<div class="attendance-list">

			<p><a href="index.php">Back to Main</a></p>

				<div style="margin-bottom: 20px;">
					<h2>Attendance</h2>
					<form method="POST"><input type="text" name="idno" placeholder="ID Number"><input type="submit" name="go" value="Go" />	</form>
				</div>



				<?php

				if(isset($res2)) {
					if (mysqli_num_rows($res2) > 0) {
				
				?>

				<table id="students">
						<tr>
								<td>ID #</td>
								<td>Name</td>
								<td>Campus</td>
								<td>Amount Paid</td>
								<td>Status</td>
								<td>Actions</td>
						</tr>
				<?php
						while($row = mysqli_fetch_assoc($res2)) {


								$idno = $row['idNum'];
								$fname = $row['studFName'];
								$lname = $row['studLName'];
								$campus = $row['campus'];
								$amount = $row['amountPaid'];
								$status = $row['attended'];
				?>

						<tr>
			                <td><?php echo $idno; ?></td>
			                <td><?php echo $fname . " " . $lname; ?></td>
			                <td><?php echo $campus; ?></td>
			                <td><?php echo $amount; ?></td>
			                <td><?php echo $status; ?></td>
                			<td>

								<form method='post' style='display:inline;' onsubmit="return confirm('Are you sure you want to record this attendance?');">
								<input type='hidden' name='attendance_id' value='<?php echo $idno; ?>'>
								<input type='submit' name='record' value='Record'>
								</form>

			                    
                			</td>
           				 </tr>


            <?php

						}

					

					}  

					  } 


				?>

			</table>

				<div style="margin-top: 20px;"><p><button type="button" onclick="clearTable()">Clear</button></p>
					<p>Not yet registered?</p> <button type="button"><a href="student_registration.php">Register Now</a></button></div>

				</div>

			</div>
		</div>
	
    <script>
        function clearTable() {
            document.getElementById('students').innerHTML = '';
        }
    </script>
</body>
</html>