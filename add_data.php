<?php

	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
	$errors = [];
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$title = $_POST['title'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$date = date('Y-m-d H:i:s');

		if(!$title) {
			$errors[] = 'Title is required';
		}

		if(!$price) {
			$errors[] = 'Price is required';
		}

		if(empty($errors)) {
		$statement = $pdo->prepare("INSERT INTO products (title,description,price,date_created)
					   VALUES (:title, :description, :price, :date_created)");

		$statement->bindValue(':title', $title);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':price', $price);
		$statement->bindValue(':date_created', $date);
		$statement->execute();
		}
	}
?>