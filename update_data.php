<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$id = $_POST['id'];

	if(!$title) {
		$errors[] = 'Title is required';
	}

	if(!$price) {
		$errors[] = 'Price is required';
	}

	if(empty($errors)) {
		$statement = $pdo->prepare("UPDATE products SET title = :title , description = :description , price = :price where id = :id ");

		$statement->bindValue(':title', $title);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':price', $price);
		$statement->bindValue(':id',$id);
		$statement->execute();

		header("Location: index.php");
	}
}
?>

<?php
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$id = $_GET['id'] ?? null;

	if(!$id) {
		header('Location: index.php');
		exit;
	}

	$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
	$statement->bindValue(':id', $id);
	$statement->execute();
	$product = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<style type="text/css">
		.add-item {
			width: 500px;
			position: fixed;
			top: 20%;
			left: 30%;
		}
	</style>
</head>
<body>
	<div class="add-item">
	<h1>Add Item</h1>
	<form method="POST" onsubmit="return(validate());">
	  <div class="mb-3">
	    <label class="form-label">Product Title</label>
	    <input type="text" class="form-control" name="title" id="title" autofocus placeholder="iPhone" value="<?php echo $product['title'] ?>">
	    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
	  </div>
	  <div class="mb-3">
	    <label class="form-label">Product description</label>
	    <textarea class="form-control" name="description"><?php echo $product['description'] ?></textarea>
	  </div>
	  <div class="mb-3">
	    <label class="form-label">Product Price</label>
	    <input type="number" step=".01" value="<?php echo $product['price'] ?>" class="form-control" name="price" id="price">
	  </div>
	  <button type="submit" class="btn btn-primary">Update</button>
	</form>
	</div>

	<script type="text/javascript">
		function validate() {
			title = document.getElementById('title');
			price = document.getElementById('price');
			console.log("Title : ", title.value)
			console.log("Price : ", price.value)
			if(title.value == '' || price.value == '') {
				alert('Title and Price must required');
			}
		}
	</script>
</body>
</html>