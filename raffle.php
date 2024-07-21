<?php 

	require 'db.php';

	if(isset($_POST['go'])) {

		$campus = $_POST['campus'];
		$showstudent = "SELECT * FROM registration WHERE campus = '$campus' ORDER BY RAND() LIMIT 1";
		$res2 = mysqli_query($conn, $showstudent);
		$rows = mysqli_fetch_all($res2, MYSQLI_ASSOC);
		
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

		.raffle-list {

			box-shadow: 0px 7px 29px 0px rgba(100, 100, 111, 0.2);
			padding: 2% 2%;
			width: 900px;
			margin: 0 auto;
			border-radius: 4px;
			box-sizing: border-box;
		}

		.raffle-list table, 
		.raffle-list table tr,
		.raffle-list table td  {
			border: 1px solid #e1e1e1;
		}

		.raffle-list table {
			width: 100%;
			border-collapse: collapse;
		}


		.raffle-list table td  {
			padding: 10px 20px;
		}

		tr:nth-child(odd) {background-color: #fff;}
		tr:nth-child(even) {background-color: #f2f2f2;}

	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			

			<div class="raffle-list">


				
				<div style="margin-bottom: 20px;">
					
					<h2>Raffle</h2>
					<form method="POST">
					 <label>
			            <input type="radio" name="campus" value="main">
			            Main
			        </label>
					 <label>
			            <input type="radio" name="campus" value="banilad">
			            Banilad
			        </label>
					 <label>
			            <input type="radio" name="campus" value="uclm">
			            LM
			        </label>
			        <br />
			        <br />
					<input type="submit" name="go" value="Reveal the winner" />	</form>
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
						</tr>
				<?php
						 foreach ($rows as $row) {
							
				?>

						<tr>
			                <td><?php echo $row['idNum']; ?></td>
			                <td><?php echo $row['studFName'] . " " . $row['studLName']; ?></td>
			                <td><?php echo $campus; ?></td>
           				 </tr>


            <?php

						} // end of foreach

					

					}  

					  } else {

						echo "No record found!";
					}


				?>

			</table>

				<div style="margin-top: 20px;"><p><button type="button" onclick="clearTable()">Clear</button></p>
					<p>Not yet registered?</p> <button type="button"><a href="student_registration.php">Register Now</a></button>
					
				</div>

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