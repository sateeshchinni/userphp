values from form submission

<?php 

$processed = FALSE;
$ERROR_MESSAGE = '';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mname = $_POST["mname"];
$email = $_POST["email"];
$password = $_POST["pass"];
$cpassword = $_POST["cpass"];

$curl_post_data = array(
            'firstName' => $fname,
            'lastName' => $lname,
			'middleName' => $mname,
            );

echo $fname;
echo $lname;
echo $mname;
echo $email;
echo $password;
echo $cpassword;

$querystring = http_build_query($curl_post_data);

echo $querystring;


$service_url = "http://10.126.136.194:8082/userdata/rest/fetch/saveUser?".$querystring;

echo $service_url;

$ch = curl_init($service_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($ch);

$json = json_decode($curl_response,true);

print_r($json);

echo $json['message'];
echo $json['success'];
echo $json['msgCode'];


curl_close($ch);


 ?>