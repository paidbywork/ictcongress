<?php

	require 'db.php';

	$id = $_GET['id'];

	$checkUser = "SELECT attended FROM congress where idNum = '$id'";
	$query4 = mysqli_query($conn, $checkUser);

	if ($query4) {

		if ($row = mysqli_fetch_assoc($query4)) {

			$attendance = $row['attended'];

			if ($attendance == 'yes') {
				echo '<script type="text/javascript">
			        alert("Attendance already recorded!");
			        window.location = "attendance.php";
			      </script>';

			} 

			if ($attendance == 'no') {

				$updateAttendance = "UPDATE congress SET attended = 'yes' WHERE idNum = '$id'";
				$query5 = mysqli_query($conn, $updateAttendance);

					 if ($query5) {

					 	echo '<script type="text/javascript">
							        alert("Attendance updated!");
							        window.location = "attendance.php";
							      </script>';
					 } else {

					 	 echo "Error updating attendance!";
								
					 
					 }
			

		}
	}

}

