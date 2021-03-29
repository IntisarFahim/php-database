<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$username= $_POST['username'];
	$password = $_POST['password'];
	$rec_email = $_POST['rec_email'];

	// Database connection
	$conn = new mysqli('localhost','root','','testregistration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, lastname, gender, email,username, password, rec_email) values(?, ?, ?, ?,?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $username, $password, $rec_email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>

 