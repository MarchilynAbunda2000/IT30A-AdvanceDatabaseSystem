<?php
// Database connection details
$host = "localhost";  // Typically "localhost" if hosted on the same server
$username = "root";   // Replace with your MySQL username
$password = "";       // Replace with your MySQL password
$database = "demo";  // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully ";

    // SQL query to retrieve data from the table (replace 'your_table_name' with your actual table name)
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);

    // Check if there are rows to display
    if ($result->num_rows > 0) {
        // Start the table
        echo "<table border='1'>
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["customer_id"] . "</td>
                <td>" . $row["first_name"] . "</td>
                <td>" . $row["last_name"] . "</td>
              </tr>";
        }

        // End the table
        echo "</table>";
    } else {
        echo "No records found.";
    }
}
