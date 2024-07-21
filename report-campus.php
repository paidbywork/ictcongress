<?php 

    require 'db.php';
    $campusFilter = '';

	// filter result based on campus
    if (isset($_POST['generate'])) {
        $campusFilter = $_POST['searchTerm'];
    }

    $sql = "SELECT * FROM registration WHERE campus LIKE '%$campusFilter%'";
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

				<div>

					<form method="post" action="">
						<label><input type="radio" name="searchTerm" value="Main" checked> Main</label>    
						<label><input type="radio" name="searchTerm" value="Banilad"> Banilad</label>  
						<label><input type="radio" name="searchTerm" value="LM"> LM </label>  

						<input type="submit" name="generate" value="Generate Report">
					</form>
					<br />
				</div>

				<?php

					if (mysqli_num_rows($result) > 0) {

				?>

				<table>
						<tr>
								<td>ID #</td>
								<td>Name</td>
								<td>Campus</td>
								<td>Amount Paid</td>
								<td>Attended</td>
						</tr>
				<?php
						while($row = mysqli_fetch_assoc($result)) {


								$idno = $row['idNum'];
								$fname = $row['studFName'];
								$lname = $row['studLName'];
								$campus = $row['campus'];
								$amount = $row['amountPaid'];
                                $attended = $row['attended'];
				?>  

						<tr>
			                <td><?php echo $idno; ?></td>
			                <td><?php echo $fname . " " . $lname; ?></td>
			                <td><?php echo $campus; ?></td>
			                <td><?php echo $amount; ?></td>
                            <td><?php echo $attended; ?></td>
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
