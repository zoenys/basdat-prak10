<!DOCTYPE html>
<html lang="en">
<head>
    <title>GFG- Store Data</title>
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
        input[type="text"] {
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
        <h1>Storing Form data in Database</h1>
        <form action="insert11.php" method="post">
            <p>
                <label for="coachNumber">Coach Number:</label>
                <input type="number" name="coach_number" id="coachNumber">
            </p>
            <p>
                <label for="coachName">Coach Name:</label>
                <input type="text" name="coach_name" id="coachName">
            </p>
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
</html>
