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
        
        $id = $_GET["id"]; //19
        $sql = "SELECT I.ReportNo, IssueDate, Test, Lab, DoctorNID
                FROM ISSUES I, MEDICALREPORT M WHERE I.ReportNo = M.ReportNo AND Patientno = $id;";
        $retval = mysqli_query($conn, $sql);
        if (mysqli_num_rows($retval) > 0)
            while($row = mysqli_fetch_assoc($retval))
                echo    "Rerport No: " . $row["ReportNo"] . 
                        "<br>Issue date: " . $row["IssueDate"] . 
                        "<br>Test: " . $row["Test"] . 
                        "<br>Lab: " . $row["Lab"] .
                        "<br>Doctor NID: " . $row["DoctorNID"] . 
                        "<br><br>";
        else 
            echo "You don't have any medical reports";
        
        mysqli_close($conn);
        ?>
    </body>
</html>