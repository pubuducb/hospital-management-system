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
        $sql = "SELECT FName, LName, Sex, DOB, AdressNo, Street1, Street2, City, Phonenumber, CivilStatus, PationNo, BGroup
                FROM PERSON PE, PATIENT PA WHERE PE.NID = PA.NID AND PA.NID = '$id';";
        $retval = mysqli_query($conn, $sql);
        if (mysqli_num_rows($retval) > 0){
            $row = mysqli_fetch_assoc($retval);
            echo    "Name: " . $row["FName"] . " " . $row["LName"] .
                    "<br>Sex: " . $row["Sex"] . 
                    "<br>Date of birth: " . $row["DOB"] . 
                    "<br>Address: " . $row["AdressNo"] . ", " . $row["Street1"] . ", " . $row["Street2"] . ", " . $row["City"] .
                    "<br>Phone Number: " . $row["Phonenumber"] . 
                    "<br>Civil Status: " . $row["CivilStatus"] . 
                    "<br>Patient No: " . $row["PationNo"] . 
                    "<br>Blood Group: " . $row["BGroup"] . 
                    "<br>";
        }
        else 
            echo "You have not registered";
        
        mysqli_close($conn);
        ?>
    </body>
</html>