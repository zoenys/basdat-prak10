<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabel Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Sets the font for the whole body */
            background-color: #f4f4f4; /* Light grey background for slight contrast */
            margin: 0;
            padding: 0;
            height: 100vh; /* Full height */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            background-color: white; /* White background for the form */
            padding: 20px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Subtle shadow for 3D effect */
        }
        h1 {
            color: #333; /* Dark grey color for the heading */
        }
        label {
            display: block; /* Makes label take full width, aligning input below */
            margin-bottom: 5px; /* Spacing below the label */
            color: #666; /* Lighter text color for labels */
        }
        input[type="number"],
        input[type="text"],
        input[type="date"] { /* Added input[type="date"] to existing styles */
            width: calc(100% - 12px); /* Full width minus padding */
            padding: 5px;
            margin-bottom: 10px; /* Spacing below each input field */
            border: 1px solid #ccc; /* Light grey border */
            border-radius: 4px; /* Rounded borders for the input fields */
        }
        input[type="submit"] {
            background-color: #4CAF50; /* Green background for the submit button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer; /* Hand cursor on hover */
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Slightly darker green on hover */
        }
        center {
            width: 100%; /* Ensures the centering div takes full width */
        }
    </style>
</head>
<body>
    <center>
        <h1>Storing Data Baru <br> Tabel Orders</h1>
        <form action="2ainsert.php" method="post">
            <p>
                <label for=orderNumber">Order Number:</label>
                <input type="number" name="orderNumber" id="orderNumber">
            </p>
            <p>
                <label for="orderDate">Order Date:</label>
                <input type="date" name="orderDate" id="orderDate">
            </p>
            <p>
                <label for="requiredDate">Required Date:</label>
                <input type="date" name="requiredDate" id="requiredDate">
            </p>
            <p>
                <label for="shippedDate">Shipped Date:</label>
                <input type="date" name="shippedDate" id="shippedDate">
            </p>
            <p>
                <label for="status">Status:</label>
                <input type="text" name="status" id="status">
            </p>
            <p>
                <label for="comments">Comments: </label>
                <input type="text" name="comments" id="comments">
            </p>
            <p>
                <label for="customerNumber">Customer Number: </label>
                <input type="number" name="customerNumber" id="customerNumber">
            </p>
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
</html>
