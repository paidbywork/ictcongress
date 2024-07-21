 <?php
    require 'db.php';

    // Get the ID from 
    $id = $_GET['id'];

    // Fetch data that needs to be edited based on the ID
	$students = "SELECT * FROM registration WHERE idNum = '$id'";
	$queryStudents = mysqli_query($conn, $students);
    $row = mysqli_fetch_assoc($queryStudents);
  
    // Query to UPDATE a student from the list
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNum = $_POST['idNum'];
    $campus = $_POST['campus'];
    $studFName = $_POST['studFName'];
    $studLName = $_POST['studLName'];
    $amountPaid = $_POST['amountPaid'];
   
    $update = "UPDATE registration SET campus='$campus', studFName='$studFName', studLName='$studLName', amountPaid='$amountPaid' WHERE idNum='$idNum'";
	$queryUpdate = mysqli_query($conn, $update);
    if ($queryUpdate) {

        echo '<script type="text/javascript">
        alert("Student updated!");
        window.location = "registration.php"; 
      </script>';

    } else {
        echo '<script type="text/javascript">
        alert("Error deleting student!");
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


		.edit {

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
        <div class="edit">
            <h1>Edit Student</h1>
            <form method="post">
                <p><input type="hidden" name="idNum" value="<?php echo $row['idNum']; ?>"></p>
                <p><input type="text" name="campus" value="<?php echo $row['campus']; ?>" readonly></p>
                <p><input type="text" name="studFName" value="<?php echo $row['studFName']; ?>"></p>
                <p><input type="text" name="studLName" value="<?php echo $row['studLName']; ?>"></p>
                <p><input type="text" name="amountPaid" value="<?php echo $row['amountPaid']; ?>"></p>
                <p><input type="submit" value="Update">
            </form>

            <div>Date: <?php echo date('n/j/Y');?></div>
            <div><a href="registration.php">Back to Student List</a></div>
         </div>

    </div>
    </div>
</body>
</html>