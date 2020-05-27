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
$Vault_TOKEN=$_ENV['Vault_Root_Token'];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://vault-vaulttest4.router.default.svc.cluster.local/v1/auth/token/create/apps-creds-role');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"policies\": \"apps-creds-policy\",\"meta\": {\"user\": \"test\"},\"ttl\": \"1h\",\"renewable\": true}");

$headers = array();
$headers[] = 'X-Vault-Token:'.$Vault_TOKEN;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
//echo $result;
$token_file=json_decode($result, true);
$client_token=$token_file['auth']['client_token'];
//echo $client_token;
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://vault-vaulttest4.router.default.svc.cluster.local/v1/secret/apps-creds');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'X-Vault-Token:'.$client_token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$final_result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
//echo $final_result;	
	
$json_var=json_decode($final_result, true);

$host = $_ENV['MYSQL_SERVICE'];
$username =$json_var['data']['user'];//file_get_contents('/etc/app/user');
$password = $json_var['data']['password'];//file_get_contents('/etc/app/pass');
$dbname = $_ENV['DATABASE_NAME'];

//$user = mysql_real_escape_string($username);
//$pwd = mysql_real_escape_string($password);
// Create connection
//echo $password;
//echo $username;

	
//echo $dbname;
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}
//echo "Connected successfully";
$query = mysqli_query($conn,"select * from cbps");
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href='api-display.php?id={$row['id']}'>{$row['emp_name']}</a></b>";
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
	<div class="log">Logout</div>
</div>

</body>
</html>
