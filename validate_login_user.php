<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['pass'];
$msg ='';

if(isset($email,$password) && !empty($email) && !empty($password)){
	//ob_start();

$curl_post_data = array(
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


$service_url = "http://10.126.136.194:8082/userdata/rest/validateuser/";

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
	//session_register("admin");
    //session_register("password");
	$_SESSION['username'] = $email;
	$_SESSION['validatemessage'] = $response['message'];
	$_SESSION['responseObj'] = $response;
	
	//echo $_SESSION['username'];
	
	header("location:welcome.php");
}
curl_close($curl);
//ob_end_flush();
}else{
	header("location:login.php?msg=Please enter some username and password");
}
 ?>