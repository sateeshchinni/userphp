<html><head>
</head>
<body>
<h1> this is my first rest call on php </h1>
</body>



<?php echo "this is sateesh php "; ?>

<?php 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://10.126.136.194:8082/userdata/rest/fetch/getUserData");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);

print_r($result);
curl_close($ch);

?>

</html>