<html><head>
</head>
<body>
<h1> this is my first php on wamp server </h1>
</body>



<?php echo "this is sateesh1"; ?>

<?php
$conn = mysqli_connect("10.126.136.194:3306","root","","helpothers") or die("Connection Failed");

if(mysqli_connect_errno()){
echo "Failed to connect mysql :" . 	mysqli_connect_errno();
}

echo "Connection Success";

$sql = "SELECT * FROM `user_data`";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0 ) {
	
	while ($row = mysqli_fetch_assoc($result)){
		echo "First Name :" . $row["FIRST_NAME"] . " last name : " . $row["LAST_NAME"];
	}
	
}else{
	echo "no data found";
}


mysqli_close($conn);




 ?>

