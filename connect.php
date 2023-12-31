<?php
	$_subject = $_POST['_subject'];
	$_replyto = $_POST['_replyto'];


	// Database connection
	$conn = new mysqli('localhost','root','','test1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into query(_subject,_replyto) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ss", $_subject, $_replyto);
		$execval = $stmt->execute();
		echo $execval;
		echo "Query Submitted...";
		$stmt->close();
		$conn->close();
	}
?>