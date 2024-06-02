<!DOCTYPE html>
<html>
<head>
    <title>Insert Page</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        center {
            width: 90%;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: auto;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        h3 {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <center>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "classicmodels";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $city = $_REQUEST['city'];
            $sql = "SELECT customerName, contactLastName, 
            contactFirstName FROM customers WHERE city = '$city'";
        
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h3>Data Customer dari $city</h3>";
                echo '<div class="table-container">';
                echo '<table id="custTable">';
                echo '<thead><tr><th>S.N</th><th>Customer Name</th>
                <th>Contact Last Name</th><th>Contact First Name</th></tr></thead>';
                echo '<tbody>';
                
                $sn = 1;
                while($data = $result->fetch_assoc()) {
                    echo "<tr><td>$sn</td><td>{$data['customerName']}</td>
                    <td>{$data['contactLastName']}
                    </td><td>{$data['contactFirstName']}</td></tr>";
                    $sn++;
                }
                echo '</tbody></table>';
                echo '</div>';
            } else {
                echo 'No data found.';
            }
        }
        $conn->close();
        ?>
    </center>
        
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#custTable').DataTable();
    });
    </script>
</body>
</html>
