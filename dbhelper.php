<?php
   
    // initiate database connection

	$servername = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'registration';

	$conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);

	if (!$conn) {

		echo "Cannot connect to the database, please try again!";
	}
	

    // insert data to the database
    

    if (isset($_POST['register'])) {

		$idno = $_POST['idno'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$campus = $_POST['campus'];
		$amount = $_POST['amount'];

		$insert = "INSERT INTO registration(idNum, studFName, studLName, camps, amountPaid) VALUES('$idno', '$fname', '$lname', '$campus', '$amount' )";
		$queryInsert = mysqli_query($conn, $insert);

		if (!$queryInsert) {


            // if there is an error when inserting the student
			echo "Cannot insert student, try again!";
		} else {
 	         
            // if no error, prompt then redirect back to the registration page
			echo '<script type="text/javascript">
		        alert("Student added!");
		        window.location = "registration.php";
		      </script>';
					
		}
	}

    // retrieve and display data from the database

    $studentlist = "SELECT * FROM registration";
	$queryDisplay = mysqli_query($conn, $studentlist);
    
    
    // delete data based on id

    $id = $_GET['id']; // get the ID from the URL

    $delete = "DELETE FROM registration WHERE idNum = $id";
    $queryDelete = mysqli_query($conn, $delete);

    if (!$queryDelete) {

        echo "Error in deleting the student!";

    } else {

        
                echo '<script type="text/javascript">
                    alert("Student deleted!");
                    window.location = "registration.php";
                </script>';
    
    }


    // edit data

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idno = $_POST['idno'];
        $campus = $_POST['campus'];
        $studFName = $_POST['studFName'];
        $studLName = $_POST['studLName'];
        $amountPaid = $_POST['amountPaid'];
        $attended = $_POST['attended'];
    
        $edit = "UPDATE registration SET campus='$campus', studName='$studName', studFName='$studFName', amountPaid='$amountPaid', attended='$attended' WHERE idNum='$idno'";
        $queryUpdate = mysqli_query($conn, $edit);

        if (!$queryUpdate) {

            echo "Error in updating the student!";
    
        } else {
            
                echo '<script type="text/javascript">
                        alert("Student updated!");
                        window.location = "registration.php";
                    </script>';
        
        }
    }


    // search

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $searchnow = "SELECT * FROM registration WHERE idno LIKE '%$search%' OR studFName LIKE '%$search%'";
        $querySearch = mysqli_query($conn, $searchnow);
    } 

    // display random results for raffle

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $campus = $_POST['campus'];
        $showWinner = "SELECT * FROM registration WHERE camps = '$campus' ORDER BY RAND() LIMIT 1";
        $queryRaffle = mysqli_query($conn, $showWinner);
    }

    // show students based on campus

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $campus = $_POST['campus'];
        $printReport = "SELECT * FROM registration WHERE camps = '$campus'";
        $queryReport = mysqli_query($conn, $printReport);
    }

    // summary (report per campus)


    $sql = "SELECT campus, 
                COUNT(*) as total_students, 
                SUM(attended) as total_attendance, 
                SUM(amountPaid) as total_collection 
            FROM registration 
            GROUP BY campus";
