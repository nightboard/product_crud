<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
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
	    <input type="text" class="form-control" name="title" id="title" autofocus placeholder="iPhone">
	  </div>
	  <div class="mb-3">
	    <label class="form-label">Product description</label>
	    <textarea class="form-control" name="description"></textarea>
	  </div>
	  <div class="mb-3">
	    <label class="form-label">Product Price</label>
	    <input type="number" step=".01" class="form-control" name="price" id="price">
	  </div>
	  <button type="submit" class="btn btn-primary">Add</button>
	</form>
	</div>
	<?php include_once "add_data.php" ?>

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