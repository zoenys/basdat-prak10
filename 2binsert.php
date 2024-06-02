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
            $productCode = $_REQUEST['productCode'];
            $productName = $_REQUEST['productName'];
            $productLine = $_REQUEST['productLine'];
            $productScale = $_REQUEST['productScale'];
            $productVendor = $_REQUEST['productVendor'];
            $productDescription = $_REQUEST['productDescription'];
            $quantityInStock = $_REQUEST['quantityInStock'];
            $buyPrice = $_REQUEST['buyPrice'];
            $MSRP = $_REQUEST['MSRP'];
        
            $sql = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
                    VALUES ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$MSRP')";
        
            if ($conn->query($sql) === TRUE) {
                echo "<h3>Storing Data Berhasil.</h3>";
            } else {
                echo "ERROR: Hush! Sorry $sql. " . $conn->error;
            }
        }

        $query = "SELECT * FROM products";
        $result = $conn->query($query);
        
        echo '<div class="table-container">';
        echo '<table id="productsTable">';
        echo '<thead><tr><th>S.N</th><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity In Stock</th><th>Buy Price</th><th>MSRP</th></tr></thead>';
        echo '<tbody>';
        
        if ($result->num_rows > 0) {
            $sn = 1;
            while($data = $result->fetch_assoc()) {
                echo "<tr><td>$sn</td><td>{$data['productCode']}</td><td>{$data['productName']}</td><td>{$data['productLine']}</td><td>{$data['productScale']}</td><td>{$data['productVendor']}</td><td>{$data['productDescription']}</td><td>{$data['quantityInStock']}</td><td>{$data['buyPrice']}</td><td>{$data['MSRP']}</td></tr>";
                $sn++;
            }
        } else {
            echo '<tr><td colspan="10">No data found</td></tr>';
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
        $('#productsTable').DataTable();
    });
    </script>

</body>
</html>
