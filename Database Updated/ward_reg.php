<html>
    <head>
        <title>Medical Report PHP</title>
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
        $date = $_GET["Date"];
        $illness = $_GET["Illness"];
        $sql1 = "INSERT INTO REGISTERED VALUES ('$nid', $wardno, '$date', '$illness', TRUE);";
        if (mysqli_query($conn, $sql1)) {
			echo "New record created successfully!<br>";
		} else {
			echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }

        $sql2 = "UPDATE WARD SET AVAILABLEBEDS = AVAILABLEBEDS - 1 WHERE WARDNO = $wardno;";
        if (mysqli_query($conn, $sql2)) {
			echo "Ward is updated";
		} else {
			echo "Error: " . $sql2. "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
    </body>
</html>