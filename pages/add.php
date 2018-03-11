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
            if (move_uploaded_file($_FILES['image']["tmp_name"], "../img/" . basename($_FILES["image"]['name']))) {
            }

            $sql = "INSERT INTO book (cat_id, book_name, book_description, book_image, author, price) VALUES ('".$_POST['cat_id']."', '".$_POST['name']."', '".$_POST['description']."', '".$_FILES["image"]['name']."', '".$_POST['author']."', '".$_POST['price']."')";

            $result = mysqli_query($db_connect, $sql);

	        header("location: admin.php");
        }
    ?>
	<form method="post" action="add.php" enctype="multipart/form-data">
		<fieldset>
			<legend>Add new Book</legend>
			<p>
				<label>Book Name</label>
				<input type="text" name="name" placeholder="Enter book name" required="">
				<br>

				<label>Book Category</label>
				<select name="cat_id">
					<option>Chosse category</option>
					<?php
						$sql = "SELECT * FROM category";
						$result = mysqli_query($db_connect, $sql);

						if ($result->num_rows > 0) {
							while ($row = mysqli_fetch_assoc($result)) { ?>
							<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
					<?php		}
						}
					?>
				</select>
				<br>

				<label>Book Author</label>
				<input type="text" name="author" placeholder="Enter author name" required="">
				<br>

				<label>Book price</label>
				<input type="text" name="price" placeholder="Enter book price" required="">
				<br>

				<label>Book Cover</label>
				<input type="file" name="image" required="">
				<br>

				<label>Book Description</label>
				<textarea name="description" placeholder="Enter book description" required=""></textarea>
				<br>

				<input type="submit" name="submit" value="Add">
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