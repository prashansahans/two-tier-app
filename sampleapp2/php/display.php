<!DOCTYPE html>
<html>
<head>
<title>Team CBPS</title>
<link href="display-style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Team Information</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click On Names</p>
<?php
//$connection = mysql_connect("db", "root", "12345"); // Establishing Connection with Server
//$db = mysql_select_db("team_record", $connection); // Selecting Database
//MySQL Query to read data
//if ($connection->connect_error) {
    //echo "Connection failed: " . $conn->connect_error;
    //}
$username = $_ENV['MYSQL_USER']
	//file_get_contents('/etc/app/user');
$password = $_ENV['MYSQL_PASSWORD']
	//file_get_contents('/etc/app/pass');
$dbname = $_ENV['DATABASE_NAME'];
$host = $_ENV['MYSQL_SERVICE'];
// Create connection


//echo $username;
//echo $password;

	
//echo $dbname;
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}
//echo "Connected successfully";
$query = mysqli_query($conn,"select * from cbps");
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href='display.php?id={$row['id']}'>{$row['emp_name']}</a></b>";
echo "<br />";
echo "<br />";
}
?>
</div>
<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
$query1 = mysqli_query($conn,"select * from cbps where id=$id");
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
	<br>
<span>Mentor Name:</span> <?php echo $row1['mentor_name']; ?>
<br>
	<br>
<span>Worked On:</span> <?php echo $row1['worked_on']; ?>
<br>
	<br>

<span>Currently Working On:</span> <?php echo $row1['currently_working']; ?>
<br>
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




