<?php
include 'api-display.php';
echo $client_token;
if(isset($_POST['logout'])) {

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://vault-vaulttest4.router.default.svc.cluster.local/v1/auth/token/revoke-self');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'X-Vault-Token:'.$client_token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
header('Location: index.php');
exit();
?>
