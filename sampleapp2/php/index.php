<!DOCTYPE html>
<html>
<head>
<title>Team CBPS</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Team Information</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click On Menu</p>
<?php
//$connection = mysql_connect("db", "root", "12345"); // Establishing Connection with Server
//$db = mysql_select_db("team_record", $connection); // Selecting Database
//MySQL Query to read data
//if ($connection->connect_error) {
    //echo "Connection failed: " . $conn->connect_error;
    //}
$host = 'mysql';
$username = 'pk';
$password = '12345';
$dbname= 'team';
// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo "Connection failed: " . $mysqli_connect_error();
}
//echo "Connected successfully";
$query = mysqli_query($conn,"select * from cbps");
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href='index.php?id={$row['emp_id']}'>{$row['emp_name']}</a></b>";
echo "<br />";
}
?>
</div>
<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
$query1 = mysqli_query($conn,"select * from cbps where id=$emp_id");
while ($row1 = mysqli_fetch_assoc($query1)) {
//$query1 = mysql_query("select * from cbps where member_name=$id", $connection);
//while ($row1 = mysql_fetch_array($query1)) {
	// output data of each row
	 ?>
<div class="form">
<h2>---Details---</h2>
<!-- Displaying Data Read From Database -->
<span>Name:</span> <?php echo $row1['emp_name']; ?>
<br>
<span>Mentor Name:</span> <?php echo $row1['mentor_name']; ?>
<br>
<span>Worked On:</span> <?php echo $row1['worked_on']; ?>
<br>
<span>Currently Working On:</span> <?php echo $row1['currently_working']; ?>
<br>


</div>
<?php
}
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>

</body>
</html>




