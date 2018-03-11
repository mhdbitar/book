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

			table {
				text-align: center;
			}

		</style>
	</head>
<body>
	<?php $db_connect = mysqli_connect("localhost", "root", "", "books"); ?>
	<header>
	<a href="../index.php">Famous books</a>
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
	<br><br><br><br><br>

	<a href="add.php">Add new Book</a>
	<table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Author</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    		<?php
				$sql = "SELECT * FROM book";
				$result = mysqli_query($db_connect, $sql);
			
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
	                        echo "<td>". $row['book_name']. "</td>";
	                        echo "<td>". $row['book_description'] ."</td>";
	                        echo "<td><img src='../img/". $row['book_image'] ."' width='100px'></td>";
	                        echo "<td>". $row['author'] ."</td>";
	                        echo "<td>". $row['price'] ."</td>";
	                        echo "<td><a href='edit.php?id=". $row['id'] ."'>Change</a> <a href='delete.php?id=". $row['id'] ."'>Remove</a> <a href='order.php?id=". $row['id'] ."'>Order</a></td>";
	                      echo "</tr>";
					}
				}
			?>    	
        </tbody>
	</table>
</body> 
</html>