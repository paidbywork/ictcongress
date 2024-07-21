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
			padding: 10% 10%;
		}

		.menu {
			background-color: #fff;
			width: 600px;
			margin: 0 auto;	
			border-radius: 4px;
			box-shadow: 0px 7px 29px 0px rgba(100, 100, 111, 0.2);
			border: 1px solid #e1e1e1;
			padding: 20px 30px;
		}

		.menu-list li {
			list-style: none;
			margin-bottom: 10px;
		}

		.menu-list li a {
				color: #333;

			}

	     .menu-list li a:hover {
	     		color: #000;
	     		border-bottom: 2px solid #e1e1e1 !important;
	     		padding-left: 10px;
	     		transition: all 300ms ease-out;
	     		font-style: italic;
	     }



	</style>
</head>
<body>

	<div class="row">
		<div class="menu">
			<h2>Choose Your Transation</h2>
			<ul class="menu-list">
				<li><a href="registration.php" target="_self">Registration</a></li>
				<li><a href="attendance.php" target="_self">Attendance</a></li></li>
				<li><a href="raffle.php" target="_self">Raffle</a></li>
				<li><a href="report-campus.php" target="_self">Report (By Campus)</a></li>
				<li><a href="report-summary.php" target="_self">Report (Summary)</a></li>
			</ul>
		</div>
	</div>

</body>
</html>