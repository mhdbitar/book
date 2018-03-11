<!DOCTYPE html>
<html>
<head>
	<title>Famous books</title>	
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<?php $db_connect = mysqli_connect("localhost", "root", "", "books"); ?>
<header>
	<a href="pages/wep.php">FAMOUS BOOKS</a>
	<div class="header">
		<div class="contact">
			<img src="img/email.png"><a href="mailto:famousbook23@gmail.com">Famousbook23@gmail.com</a>
			<img src="img/phone.png"><span>+966 5 32 16 42 50</span>
		</div>
	</div>


	</header>
	<nav>
		<?php

			$sql = "SELECT * FROM category";
			$result = mysqli_query($db_connect, $sql);

			if ($result->num_rows) {
				while ($row = mysqli_fetch_assoc($result)) { ?>
					<a href="pages/books.php?id=<?= $row['id']; ?>&cat=<?= $row['name'] ?>"> <?= $row['name'] ?></a>
					<br>					
			<?php } } 
		?>
	</nav>
	<?php

        if (isset($_POST["submit"]))
        { 
            $sql = "SELECT * FROM users where email='".$_POST['email']."' AND password='".$_POST['password']."'";
            $result = mysqli_query($db_connect, $sql);

            if ($result) { ?>
            <script type="text/javascript">
            	alert("You are logged in.");
            </script>
            <?php }
            header("location: pages/add.php");
        }
    ?>
	<form method="post" action="index.php">
		<fieldset>
			<legend>Sing in</legend>
			<p>
				<label>Email</label>
				<input type="email" name="email" placeholder="Enter email">
				<br>

				<label>Password </label>
				<input type="password" name="password" placeholder="Enter password">
				<br>

				<input type="submit" name="submit" value="Sing in">
				<a href="pages/register.php">Register</a>
			</p>
		</fieldset>
	</form>
	<center>
		<h1>MEET THE FAMOUS BOOKS HERE</h1>
		<div class="cotanet">
			<div class="photo">
				<img src="img/pn.png">
			</div>
		</div>
	</center>
	<footer>
		<center>
			<h4>copyright&copy2017</h4>
			<div class="header">
				<div class="contact">
					<a href="pages/admin.php">Books Manager</a>
				</div>
			</div>
		</center>
	</footer>
</body>
</html>