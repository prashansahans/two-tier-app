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
$OCP_TOKEN=file_get_contents('/var/run/secrets/kubernetes.io/serviceaccount/token'); 
//echo $OCP_TOKEN;
$data = array(
	"jwt" => $OCP_TOKEN,
	"role" => "frontend-mysql"
);
if($data['jwt'] == "eyJhbGciOiJSUzI1NiIsImtpZCI6IiJ9.eyJpc3MiOiJrdWJlcm5ldGVzL3NlcnZpY2VhY2NvdW50Iiwia3ViZXJuZXRlcy5pby9zZXJ2aWNlYWNjb3VudC9uYW1lc3BhY2UiOiJ2YXVsdHRlc3Q0Iiwia3ViZXJuZXRlcy5pby9zZXJ2aWNlYWNjb3VudC9zZWNyZXQubmFtZSI6InZhdWx0LWZyb250ZW5kLW15c3FsLXRva2VuLXZiOXA0Iiwia3ViZXJuZXRlcy5pby9zZXJ2aWNlYWNjb3VudC9zZXJ2aWNlLWFjY291bnQubmFtZSI6InZhdWx0LWZyb250ZW5kLW15c3FsIiwia3ViZXJuZXRlcy5pby9zZXJ2aWNlYWNjb3VudC9zZXJ2aWNlLWFjY291bnQudWlkIjoiYTBmMjE4NjMtODhhOC0xMWVhLWI4NjctMDA1MDU2YmZkNGZhIiwic3ViIjoic3lzdGVtOnNlcnZpY2VhY2NvdW50OnZhdWx0dGVzdDQ6dmF1bHQtZnJvbnRlbmQtbXlzcWwifQ.rdBpcVKl2kGky6LPpbIx8YdSC-zpqvLtUngBTht1ApHQiFVu7xsSqAgHqqrWJNIV9m0De5SXFPMap-Qou6Rje76dJ6vemTiIPSDYS4Y8TBw-zZFK-AQO5RyD_EBBALyhefpugZvStgVmQBX3Ju4oyBNJ2DEAtu6yUKj34MexRNUUdOIauzlhga9X5V5m0yQkUusFYNzYTisswbgFSrXHDf4FEsefZPjx5aKsZFSGIWKKFkQG07ay4fPABKHTCfmfjyYhh-QEP3zSQ7SPhDLjYrpfzZkuvUQTLbhE9mxn_-P-pYgiX53bj9V79b5SjRRfBzHUmB--RDiQoHjupYSY1g")
echo "true";	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://vault-vaulttest4.router.default.svc.cluster.local/v1/auth/kubernetes/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    
}
echo $result;	
	
curl_close($ch);
echo $result;
//echo $_ENV["X_VAULT_TOKEN"];
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/

$json_file=file_get_contents('/etc/app/creds.json');
$json_var=json_decode($json_file, true);


$host = $_ENV['MYSQL_SERVICE'];
$username =$json_var['data']['user'];//file_get_contents('/etc/app/user');
$password = $json_var['data']['password'];//file_get_contents('/etc/app/pass');
$dbname = $_ENV['DATABASE_NAME'];

//$user = mysql_real_escape_string($username);
//$pwd = mysql_real_escape_string($password);
// Create connection
;
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
