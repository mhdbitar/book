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
				width: 30%;
			}

			h3, h1 {
				text-align: center;
			}

			a {
				text-decoration: none;
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
	
 <h1><?= $_GET['cat'] ?></h1>
 <br><br>
<ol>
<?php

	$sql = "SELECT * FROM book WHERE cat_id = " . $_GET['id'];
	$result = mysqli_query($db_connect, $sql);

	if ($result->num_rows) {
		while ($row = mysqli_fetch_assoc($result)) { ?>
			<li>
				<a href="details.php?id=<?= $row['id'] ?>">
					<img src="../img/<?= $row['book_image'] ?>" alt="<?= $row['book_name'] ?>" width="100%">
					<h3><?= $row['book_name'] ?></h3>
				</a>
				
			</li>					
	<?php } } 
?>
</ol>
 

</body> 
</html>