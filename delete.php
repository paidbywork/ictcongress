<?php

require 'db.php';
$id = $_GET['id'];

    $delete = "DELETE FROM registration WHERE idNum = $id";
    $queryDelete = mysqli_query($conn, $delete);

    if (!$queryDelete) {

        echo "Error in deleting the student!";

    } else {

                // show a prompt to the user after the student is successfully deleted
                // then redirect the user back to registration.php 
                echo '<script type="text/javascript">
                    alert("Student deleted!");
                    window.location = "registration.php";
                </script>';
    
    }