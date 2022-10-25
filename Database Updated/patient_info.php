<html>
    <head>
        <title>Patient Information PHP</title>
    </head>
    <body>
        <?php
        $dbhost = 'localhost:3308';
        $dbuser = 'root';
        $dbpass = '';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
        mysqli_select_db($conn, 'Hospital_Management_System');
        
        $id = $_GET["id"]; //92005314v
        $sql = "SELECT FName, LName, Sex, DOB, AddressNo, Street1, Street2, City, Phonenumber, CivilStatus, PatientNo, BGroup
                FROM PERSON PE, PATIENT PA WHERE PE.NID = PA.NID AND PA.NID = '$id';";
        $retval = mysqli_query($conn, $sql);
		
		
		
        if (mysqli_num_rows($retval) > 0){
            $row = mysqli_fetch_assoc($retval);
            echo    "Name: " . $row["FName"] . " " . $row["LName"] .
                    "<br>Sex: " . $row["Sex"] . 
                    "<br>Date of birth: " . $row["DOB"] . 
                    "<br>Address: " . $row["AddressNo"] . ", " . $row["Street1"] . ", " . $row["Street2"] . ", " . $row["City"] .
                    "<br>Phone Number: " . $row["Phonenumber"] . 
                    "<br>Civil Status: " . $row["CivilStatus"] . 
                    "<br>Patient No: " . $row["PatientNo"] . 
                    "<br>Blood Group: " . $row["BGroup"] . 
                    "<br>Patient Allergy: ";
					
        }
        else 
            echo "You have not registered";
		
		$sql2="SELECT ALLERGY FROM PATIENTALLERGY WHERE PATIENTNO=(SELECT PATIENTNO FROM PATIENT WHERE NID='$id')";
		$retval = mysqli_query($conn, $sql2);
		
		if (mysqli_num_rows($retval) > 0){
			
			while($row = mysqli_fetch_assoc($retval)){
				
				echo  $row["ALLERGY"]."&nbsp&nbsp&nbsp&nbsp&nbsp"; 
				
			} 
        }
        else 
            echo "There is no allergy for this ";
        
        mysqli_close($conn);
        ?>
    </body>
</html>