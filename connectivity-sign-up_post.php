<?php 
session_start();

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mname = $_POST["mname"];
$email = $_POST["email"];
$password = $_POST["pass"];
$cpassword = $_POST["cpass"];

if(isset($email,$password) && !empty($email) && !empty($password) ){

$curl_post_data = array(
            'firstName' => $fname,
            'lastName' => $lname,
			'middleName' => $mname,
			'emailAddress' => $email,
			'password' => md5($password),
            );

/* echo $fname;
echo $lname;
echo $mname;
echo $email;
echo $password;
echo $cpassword; */

$content = json_encode($curl_post_data);

// echo $content;


$service_url = "http://10.126.136.194:8082/userdata/rest/registeruser/";

// echo $service_url;

$curl = curl_init($service_url);

curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

// echo $json_response;

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// echo $status;

$response = json_decode($json_response, true);

// print_r($response);

//echo $response['message'];
//echo $response['status'];
//echo $response['code'];

if( $response['code'] == 404 ){
	echo $response['message'];
	
	header("location:login.php?msg=$response[message]");
	
	
}else if( $response['code'] == 200 ){
	echo $response['message'];
	$_SESSION['username'] = $email;
	
	header("location:welcome.php");
	
}
curl_close($curl);
}else{
	header("location:signup.php?msg=Please enter some value for email and password");
}

 ?>