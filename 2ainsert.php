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
            $orderNumber = $_REQUEST['orderNumber'];
            $orderDate = $_REQUEST['orderDate'];
            $requiredDate = $_REQUEST['requiredDate'];
            $shippedDate = $_REQUEST['shippedDate'];
            $orderStatus = $_REQUEST['status'];
            $orderComments = $_REQUEST['comments'];
            $customerNumber = $_REQUEST['customerNumber'];

            $sql = "INSERT INTO orders VALUES ('$orderNumber', '$orderDate',
             '$requiredDate', '$shippedDate', '$orderStatus', '$orderComments', 
             '$customerNumber')";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>Storing Data Berhasil.</h3>";
            } else {
                echo "ERROR: Hush! Sorry $sql. " . $conn->error;
            }
        }

        $query = "SELECT * FROM orders";
        $result = $conn->query($query);

        echo '<div class="table-container">';
        echo '<table id="ordersTable">';
        echo '<thead><tr><th>S.N</th><th>Order Number</th><th>Order Date</th>
        <th>Required Date</th><th>Shipped Date</th><th>Status</th><th>Comments</th>
        <th>Customer Number</th></tr></thead>';
        echo '<tbody>';

        if ($result->num_rows > 0) {
            $sn = 1;
            while($data = $result->fetch_assoc()) {
                echo "<tr><td>$sn</td><td>{$data['orderNumber']}</td>
                <td>{$data['orderDate']}</td><td>{$data['requiredDate']}
                </td><td>{$data['shippedDate']}</td><td>{$data['status']}</td>
                <td>{$data['comments']}</td><td>{$data['customerNumber']}</td></tr>";
                $sn++;
            }
        } else {
            echo '<tr><td colspan="8">No data found</td></tr>';
        }
        echo '</tbody></table>';
        echo '</div>';
        
        $conn->close();
        ?>
    </center>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable();
        });
    </script>
</body>
</html>
