<html>
    <head>
        <title>Ward Discharge PHP</title>
    </head>
    <body>
        <?php
        $dbhost = 'localhost:3308';
        $dbuser = 'root';
        $dbpass = '';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
        mysqli_select_db($conn, 'Hospital_Management_System');
        
        $nid = $_GET["NID"];
        $wardno = $_GET["WardNo"];
        $sql1 = "UPDATE REGISTERED SET DISCHARGED  = FALSE WHERE PATIENTNID = '$nid' AND WARDNO = $wardno;";
        if (mysqli_query($conn, $sql1)) {
			echo "Patient is discharged!<br>";
		} else {
			echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }

        $sql2 = "UPDATE WARD SET AVAILABLEBEDS = AVAILABLEBEDS + 1 WHERE WARDNO = $wardno;";
        if (mysqli_query($conn, $sql2)) {
			echo "Ward is updated";
		} else {
			echo "Error: " . $sql2. "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
    </body>
</html>