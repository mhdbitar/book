<?php
	$connection = mysqli_connect("localhost", "root", "", "books");
	$id = $_GET['id'];

	$sql = "DELETE FROM book WHERE id = '$id'";
	$result = mysqli_query($connection, $sql);

	header('location: admin.php');
?>