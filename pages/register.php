<!DOCTYPE html>
<html>
<head>
	<title>Famous books</title>	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<?php $db_connect = mysqli_connect("localhost", "root", "", "books"); ?>
<header>
	<a href="../index.php">FAMOUS BOOKS</a>
	<div class="header">
		<div class="contact">
			<img src="../img/email.png"><a href="mailto:famousbook23@gmail.com">Famousbook23@gmail.com</a>
			<img src="../img/phone.png"><span>+966 5 32 16 42 50</span>
		</div>
	</div>


	</header>
	<nav>
		<?php

			$sql = "SELECT * FROM category";
			$result = mysqli_query($db_connect, $sql);

			if ($result->num_rows) {
				while ($row = mysqli_fetch_assoc($result)) { ?>
					<a href="books.php?id=<?= $row['id']; ?>&cat=<?= $row['name'] ?>"> <?= $row['name'] ?></a>
					<br>					
			<?php } } 
		?>
	</nav>
	<?php
       
        if (isset($_GET["submit"]))
        {
            $sql = "INSERT INTO users (fName, lName, email, password) VALUES ('".$_GET['fName']."', '".$_GET['lName']."', '".$_GET['email']."', '".$_GET['password']."')";
           
            $result = mysqli_query($db_connect, $sql);

          header("location: ../index.php");
        }
    ?>
	<form method="get" action="register.php">
		<fieldset>
			<legend>Sing up</legend>
			<p>
				<label>First Name</label>
				<input type="text" name="fName" placeholder="Enter first name" required="">
				<br>

				<label>Last Name</label>
				<input type="text" name="lName" placeholder="Enter last name" required="">
				<br>

				<label>Email</label>
				<input type="email" name="email" placeholder="Enter email" required="">
				<br>

				<label>Password</label>
				<input type="password" name="password" placeholder="Enter password" required="">
				<br>

				<input type="submit" name="submit" value="Sing up">
			</p>
		</fieldset>
	</form>
	<footer>
		<center>
			<h4>copyright&copy2017</h4>
			<div class="header">
				<div class="contact">
					<a href="admin.php">Books Manager</a>
				</div>
			</div>
		</center>
	</footer>
</body>
</html>