<html>
<head>
	<title>Data Connect Demo</title>
</head>
<body>
	<?php
	if (isset($_POST["submit"])) {
		try {
			$db = new PDO('mysql:host=sql1.njit.edu;dbname=dv272','dv272','6BURYkJzE');

		}catch(PDOException $exc) {
			echo "<h1>Error: Connection failed!</h1><br>";
		}
		$qry = 'select * from accounts where id < 6';
		$rslt = $db->prepare($qry);
		$rslt->execute();
		echo "Number of results: ".$rslt->rowCount()."<br>";
		echo "<table>";
		if (count($rslt) > 0) {
			echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
			foreach ($rslt as $row) {
				echo "<tr><td>".$row['id']."</td><td>".$row['email']."</td><td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['phone']."</td><td>".$row['birthday']."</td><td>".$row['gender']."</td><td>".$row['password']."</td></tr>";
			}
		}
		echo "</table>";
		$db = NULL;
	}else {
		echo "<h3>Press connect to display users having ID less than 6.</h3>";
		echo "<form method=\"post\" enctype=\"multipart/form-data\">";
		echo "<input type=\"submit\" value=\"Connect!\" name=\"submit\">";
		echo "</form>";
	}
	?>
</body>
</html>