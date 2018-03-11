<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Famous books</title> 
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		
		<style type="text/css">
			li {
				list-style-type: none;
				display: inline-block;
			}

			h3, h1 {
				text-align: center;
			}

			a {
				text-decoration: none;
			}

			.details h3 {
				text-align: inherit;
			}

			.details span {
				font-style: italic;
			}

		</style>
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
	<br><br><br><br><br>
	<?php
		$sql = "SELECT * FROM book WHERE id =" . $_GET['id'];
		$result = mysqli_query($db_connect, $sql);
		
		$name = "";
		$description = "";
		$price = 0;
		$author = "";
		$image = "";

		if ($result->num_rows == 1) {
			while ($row = mysqli_fetch_assoc($result)) {
				$name = $row['book_name'];
				$description = $row['book_description'];
				$author = $row['author'];
				$price = $row['price'];
				$image = $row['book_image'];
			}
		}
	?>

	<br><br>
<center>	
	<div class="details">
		<img src="../img/<?= $image ?>" alt="<?= $name ?>">
		<h3><?= $name ?></h3>
		<h4><span>by,</span> <strong><?= $author ?></strong></h4>
		<p><?= $description ?></p>
		<p><?= $price ?> $</p>	
	</div>
</center>

</body> 
</html>