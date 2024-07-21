<?php 

	require 'db.php';
   

    $sql = "SELECT campus, COUNT(*) AS total_students,
     SUM(attended) AS total_attendance,
     SUM(amountPaid) AS total_collection
     FROM registration
     GROUP BY campus";
    $result = mysqli_query($conn, $sql);
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
            <p><a href="index.php">Back to Main</a></p>


				<?php

					if (mysqli_num_rows($result) > 0) {

				?>

				<table>
						<tr>
								<td>Campus</td>
								<td>Registered</td>
								<td>Attended</td>
								<td>Total Collection</td>
								
						</tr>
				<?php
						while($row = mysqli_fetch_assoc($result)) {

				?>  

						<tr>
			                <td><?php echo $row['campus']; ?></td>
			                <td><?php echo $row['total_students']; ?></td>
			                <td><?php echo $row['total_attendance']; ?></td>
			                <td><?php echo $row['total_collection']; ?></td>
                            
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