<html>
    <head>
        <title>PHP</title>
    </head>
    <body>
        <?php
        //phpinfo();
        $dbhost = 'localhost:3308';
        $dbuser = 'root';
        $dbpass = '';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
        if(!$conn) {
            die('Could not connect: ' . mysqli_error());
        }
        echo 'Connected successfully';

        mysqli_select_db($conn, 'HOSPITAL_MANAGEMENT_SYSTEM');
		
		$NID = $_GET['NID'];
		$FName = $_GET['FName'];
		$LName = $_GET['LName'];
		$Gender = $_GET['Gender'];
		$DOB = $_GET['DOB'];
		$No = $_GET['No'];
		$Street1 = $_GET['Street1'];
		$Street2 = $_GET['Street2'];
		$City = $_GET['City'];
		$PNO = $_GET['PNO'];
		$Civil = $_GET['Civil'];
		
        $sql = "INSERT INTO PERSON VALUES ('$NID','$FName','$LName','$Gender','$DOB','$No','$Street1','$Street2','$City','$PNO','$Civil','PATIENT');";
        
        if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


        mysqli_close($conn);
        ?>
    </body>
</html>
