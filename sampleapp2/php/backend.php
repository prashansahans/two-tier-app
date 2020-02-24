<?php
$host = 'db';
$username = "root";
$password = "12345";
$dbname= 'team_record';
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {	
    echo "Connection failed: " . $conn->connect_error;
}
echo "Connected successfully";
$sql = "SELECT * FROM cbps";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["member_name"]. " - Name: " . $row["mentor_name"]. " " . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
