<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pbd_zoen";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $coachNumber =  $_REQUEST['coach_number'];
        $coachName = $_REQUEST['coach_name'];

         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO tabel2_coaches  VALUES ('$coachNumber', 
            '$coachName')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>"; 
 
            echo nl2br("\n$coachNumber\n $coachName\n ");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>