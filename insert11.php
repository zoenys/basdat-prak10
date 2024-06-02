<!DOCTYPE html>
<html>
<head>
    <title>Insert Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Consistent font throughout the page */
            background-color: #f0f0f0; /* Light grey background */
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        center {
            width: 90%; /* Limits the width of the center content */
            background: #fff; /* White background for the content area */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds shadow for 3D effect */
            border-radius: 10px; /* Rounded corners */
        }
        table {
            width: 100%; /* Full width tables */
            border-collapse: collapse; /* Ensures borders between cells are merged */
            margin-top: 20px; /* Space above the table */
        }
        th, td {
            border: 1px solid #ccc; /* Light grey border for th and td */
            padding: 8px; /* Padding inside cells */
            text-align: left; /* Aligns text to the left */
        }
        th {
            background-color: #4CAF50; /* Green background for headers */
            color: white; /* White text for headers */
        }
        h3 {
            margin-top: 20px; /* Space above the h3 header */
            color: #333; /* Dark grey color for text */
        }
    </style>
</head>
<body>
    <center>
        <?php
        // Database connection settings
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

        // Taking values from the form data(input)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $coachNumber = $_REQUEST['coach_number'];
            $coachName = $_REQUEST['coach_name'];

            // SQL query to insert data into the coaches table
            $sql = "INSERT INTO tabel2_coaches VALUES ('$coachNumber', '$coachName')";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>Data stored in a database successfully.<br>Here is your data table.</h3>"; 
                // echo nl2br("\n$coachNumber\n$coachName\n");
            } else {
                echo "ERROR: Hush! Sorry $sql. " . $conn->error;
            }
        }

        // Query to select data from the database
        $query = "SELECT coach_no, coach_name FROM tabel2_coaches";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo '<table border="1" cellspacing="0" cellpadding="10">';
            echo '<tr><th>S.N</th><th>Coach Number</th><th>Coach Name</th></th></tr>';
            
            $sn = 1;
            while($data = $result->fetch_assoc()) {
                echo "<tr><td>$sn</td><td>{$data['coach_no']}</td><td>{$data['coach_name']}</tr>";
                $sn++;
            }
            echo '</table>';
        } else {
            echo '<table><tr><td colspan="8">No data found</td></tr></table>';
        }

        // Close connection
        $conn->close();
        ?>
    </center>
</body>
</html>
