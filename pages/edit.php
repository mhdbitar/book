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
            $sql = "UPDATE book SET book_name = '".$_POST['name']."', book_description = '". $_POST['description'] ."', author = '". $_POST['author'] ."', price = '".$_POST['price']."' WHERE id = " . $_GET['id'];

            $result = mysqli_query($db_connect, $sql);

	        header("location: admin.php");
        }
    ?>
	<form method="post" action="edit.php?id=<?= $_GET['id'] ?>">
		<fieldset>
			<?php
				$sql = "SELECT * FROM book WHERE id = " . $_GET['id'];
	            $result = mysqli_query($db_connect, $sql);

            	if ($result->num_rows > 0) {
                	while ($row = mysqli_fetch_assoc($result)) {
            ?>
				<legend>Edit Book</legend>
				<p>
					<label>Book Name</label>
					<input type="text" name="name" placeholder="Enter book name" required="" value="<?= $row['book_name'] ?>">
					<br>

					<label>Book Author</label>
					<input type="text" name="author" placeholder="Enter author name" required="" value="<?= $row['author'] ?>">
					<br>

					<label>Book price</label>
					<input type="text" name="price" placeholder="Enter book price" required="" value="<?= $row['price'] ?>">
					<br>

					<label>Book Description</label>
					<textarea name="description" placeholder="Enter book description" required="" value="<?= $row['book_description'] ?>"><?= $row['book_description'] ?></textarea>
					<br>

					<input type="submit" name="submit" value="Edit">
				</p>
			<?php } } ?>
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