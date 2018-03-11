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
        if (isset($_POST["submit"]))
        {
            $name = $_POST['name'];
            $phone = $_POST['number'];
            
            $file = "../files/".$name.".txt";

            file_put_contents($file, $name);
        }
    ?>
	<form method="post" action="order.php?id=<?= $_GET['id'] ?>">
		<fieldset>
			<legend>Order a Book</legend>
			<p>
				<label>Customer Name</label>
				<input type="text" name="name" placeholder="Enter Customer Name" required="">
				<br>

				<label>Phone number</label>
				<input type="text" name="number" placeholder="Enter Phone Number" required="">
				<br>

				<input type="submit" name="submit" value="Send">
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